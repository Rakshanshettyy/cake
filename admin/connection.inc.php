<?php
session_start();
$con=mysqli_connect("localhost","root","","bakenbites");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/bakenbites/');
define('SITE_PATH','http://127.0.0.1:8080/php/bakenbites/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
define('PRODUCT_MULTIPLE_IMAGE_SERVER_PATH',SERVER_PATH.'media/product_images/');
define('PRODUCT_MULTIPLE_IMAGE_SITE_PATH',SITE_PATH.'media/product_images/');
?>
?>
