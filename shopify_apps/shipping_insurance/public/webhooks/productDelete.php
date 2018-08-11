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
$fh=fopen('prodDelete.txt', 'w');
// fwrite($fh,$data);

$Array    =json_decode($data);
$product_id = $Array->id;
fwrite($fh, $product_id);

$_DOMAIN  =$_SERVER['HTTP_X_SHOPIFY_SHOP_DOMAIN'];
fwrite($fh, $_DOMAIN);

///////////// Get token from database /////////
$sql="SELECT * from product_details where shopDomain='".$_DOMAIN."' ";
$qex=mysqli_query($newCon,$sql);
$res = mysqli_fetch_array($qex);

$productID = $res['productID'];
fwrite($fh, 'db productID'.$productID);

if($product_id == $productID)
{ 
	$deleteRecord="DELETE from product_details where shopDomain='".$_DOMAIN."' ";
	// $deleteRecord= "UPDATE app_data SET app_installed=0 WHERE shop_domain='$_DOMAIN' ";
	$executeDelete=mysqli_query($newCon,$deleteRecord);	
}




?>

