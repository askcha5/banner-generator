<?php
include 'config.php';
include 'functions.php';
include 'classlib.php';


if ($_GET) {
    header ("Content-type: image/png");
    
    $banner = new Banner();
    $banner->width = $_GET['width'];
    $banner->height = $_GET['height'];
    $banner->bg_color_r = $_GET['bg_r'];
    $banner->bg_color_g = $_GET['bg_g'];
    $banner->bg_color_b = $_GET['bg_b'];
    $banner->txt_color_r = $_GET['txt_r'];
    $banner->txt_color_g = $_GET['txt_g'];
    $banner->txt_color_b = $_GET['txt_b'];
    $banner->txt = $_GET['txt'];
    $banner->txt_size = $_GET['txt_size'];
    $banner->bdr_size = $_GET['bdr_size'];
    $banner->bdr_color_r = $_GET['bdr_r'];
    $banner->bdr_color_g = $_GET['bdr_g'];
    $banner->bdr_color_b = $_GET['bdr_b'];
    $banner->target_url = $_GET['targ_url'];

    $handle = ImageCreate ($banner->width, $banner->height) or die ("Cannot Create image");
    $bg_color = ImageColorAllocate ($handle, $banner->bg_color_r, $banner->bg_color_g, $banner->bg_color_b);
    $txt_color = ImageColorAllocate ($handle, $banner->txt_color_r, $banner->txt_color_g, $banner->txt_color_b);
    $bdr_color = ImageColorAllocate($handle, $banner->bdr_color_r, $banner->bdr_color_g, $banner->bdr_color_b);

    drawBorder($handle, $bdr_color, $banner->bdr_size);
    
    $font_fam = "fonts/Neuton-Regular.ttf";
    
    $bbox = imagettfbbox($banner->txt_size, 0, $font_fam, $banner->txt);
    $x = ceil(($banner->width - ($bbox[4] - $bbox[0])) / 2);
    $y = ceil(($banner->height - ($bbox[5] - $bbox[1])) / 2);
    
    imagettftext($handle, $banner->txt_size, 0, $x, $y, $txt_color, $font_fam, $banner->txt);

    if ($_POST && $_POST['save'] == 'Y') {
        ob_start();
        ImagePng ($handle);
        $banner->image_blob = ob_get_contents();
        ob_end_clean();
        
        $banner->save();
        
        $banner_id = $banner->id;
        
        echo "-banner_id-" . $banner_id;//image stream gets echoed first so need to pass back the saved image's row id like this
    } else {
        ImagePng ($handle);
    }
    
    ImageDestroy($handle);
}
?>