<?php
session_start();
$conn = mysqli_connect("localhost","root","","ecom");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/ecom/ecommerce');
define('SITE_PATH','http://localhost/ecom/ecommerce/');
define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'product/');
?>

