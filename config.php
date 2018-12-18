<?php
// Connection
$db_host="localhost";
$db_name="banner";
$username="banner";
$password="banner123";
mysql_connect($db_host,$username,$password,true) or die("MySQL connection error");
mysql_select_db($db_name) or die("MySQL db select error");
?>