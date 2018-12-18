<?php
function mysql_real_escape_string_deep($x=null) {
    if (!isset($x))
        return null;
    else if (is_string($x))
        return mysql_real_escape_string($x);
    else if (is_array($x)) {
        foreach ($x as $k => $v) {
            $k2 = mysql_real_escape_string($k);
            if ($k != $k2)
                unset($x[$k]);
            $x[$k2] = mysql_real_escape_string_deep($v);
        }
        return $x;
    }
}

function stripslashes_deep($value) {
    $value = is_array($value) ?
            array_map('stripslashes_deep', $value) :
            stripslashes($value);

    return $value;
}

function drawBorder(&$img, &$color, $thickness) 
{ 
    $x1 = 0; 
    $y1 = 0; 
    $x2 = ImageSX($img) - 1; 
    $y2 = ImageSY($img) - 1; 

    for($i = 0; $i < $thickness; $i++) 
    { 
        ImageRectangle($img, $x1++, $y1++, $x2--, $y2--, $color); 
    } 
}
?>