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
$fh=fopen('Uninstall.txt', 'w');

fwrite($fh,$data);
$Array    =json_decode($data);

$_DOMAIN  =$_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
fwrite($fh, $_DOMAIN);

if(!empty($Array))
{
	// $deleteRecord="DELETE from app_data where shop_domain='$_DOMAIN' ";
	$current_time = date('Y-m-d H:i:s');
	$updateRecord="UPDATE app_data set app_installed=0,uninstallation_date='$current_time' where shop_domain='$_DOMAIN' ";
	$executeDelete=mysqli_query($newCon,$updateRecord);	
	// $deleteRecord="DELETE from appcharges_details where shopDomain='$_DOMAIN' ";
	// $executeDelete=mysqli_query($newCon,$deleteRecord);	
	$deleteRecord="DELETE from product_details where shopDomain='".$_DOMAIN."' ";
	$executeDelete=mysqli_query($newCon,$deleteRecord);	
}


?>

