<?php
include 'config.php';
include 'functions.php';
include 'classlib.php';


if ($_GET || $_POST) {
    $banner = new Banner();
    $banner->id = $_GET['banner'];
    $banner->load();
    
    if ($_POST['url'] == 'Y') {
        $return_arr = array("target_url" => $banner->target_url);
        echo json_encode($return_arr);
    } else if ($_GET['img'] == 'Y') {
        header ("Content-type: image/png");
        echo $banner->image_blob;
    }
}
?>