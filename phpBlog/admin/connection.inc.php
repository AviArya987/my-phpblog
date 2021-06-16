<?php
session_start();
$con=mysqli_connect("localhost","root","","blogs");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/blogs/');
define('SITE_PATH','http://127.0.0.1/php/ecom/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/blog/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/blog/');
?>