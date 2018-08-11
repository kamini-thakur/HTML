<?php

/*      getting the domain from which request is made      */
$_HOST     = 'localhost';
$_USER_NAME= 'root';
$_PASSWORD = 'mediabaseapps123';
$_DATABASE = 'shipping_insurance';

$newCon=mysqli_connect($_HOST, $_USER_NAME,$_PASSWORD,$_DATABASE);
if(mysqli_connect_errno())
{
	echo "connection failed";
}

$data = file_get_contents('php://input');
$fh=fopen('orderCreate.txt', 'w');

fwrite($fh,$data);
$Array    =json_decode($data);

$_DOMAIN  =$_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
fwrite($fh, $_DOMAIN);


?>

