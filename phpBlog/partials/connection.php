<?php

$con = mysqli_connect("localhost","root","","blogs");
if(!$con){
	echo "Connection unsuccessful";
}

define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/phpblog/');
define('SITE_PATH','http://127.0.0.1/php/blog/');

?>