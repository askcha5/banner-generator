<?php
class Banner {
    
    private $width;
    private $height;
    private $bg_color_r;
    private $bg_color_g;
    private $bg_color_b;
    private $txt;
    private $txt_size;
    private $txt_color_r;
    private $txt_color_g;
    private $txt_color_b;
    private $bdr_size;
    private $bdr_color_r;
    private $bdr_color_g;
    private $bdr_color_b;
    private $target_url;
    private $image_blob;
    private $id;

    
    public function __construct() {
    }
    
    public function __get($property) {
        if (property_exists($this, $property)) {
            switch($property) {
                case 'txt':
                case 'target_url':
                    return stripslashes_deep($this->$property);
            }
            
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            switch($property) {
                case 'width':
                case 'height':
                case 'bg_color_r':
                case 'bg_color_g':
                case 'bg_color_b':
                case 'txt_size':
                case 'txt_color_r':
                case 'txt_color_g':
                case 'txt_color_b':
                case 'bdr_size':
                case 'bdr_color_r':
                case 'bdr_color_g':
                case 'bdr_color_b':
                case 'id':
                    $value = intval($value);
                    break;
                case 'txt':
                case 'target_url':
                case 'image_blob':
                    $value = mysql_real_escape_string_deep($value);
                    break;
            }
            
            $this->$property = $value;
        }

        return $this;
    }
    
    public function __toString() {
        return "";
    }
    
    public function save() {
        mysql_query("INSERT INTO banners VALUES (NULL, '$this->image_blob', '$this->target_url')");
        $this->id = mysql_insert_id();
    }
    
    public function load() {
        $row = mysql_fetch_array(mysql_query("SELECT * FROM banners WHERE id = $this->id"));
        $this->image_blob = $row['image'];
        $this->target_url = $row['target_url'];
    }
}
?>