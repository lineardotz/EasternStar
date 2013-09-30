<?php

session_start();

$inputProductID = $_POST['productid'];
$inputQuantity = $_POST['quantity'];
if(isset($_SESSION['mycart']))
{	
	$myCartArray = $_SESSION['mycart'];
	$first_key = key($myCartArray);
	if ($first_key > 0) 
	{
		$myCartArray[$inputProductID] = $inputQuantity;
	}
	else 
	{
		unset($myCartArray);
		$myCartArray[$inputProductID] = $inputQuantity;
	}
	$_SESSION['mycart'] = $myCartArray;
}
else 
{
	$myCartArray = array("0"=>"0");
	$first_key = key($myCartArray);
	if ($first_key > 0)
	{
		$myCartArray[$inputProductID] = $inputQuantity;
	}
	else
	{
		unset($myCartArray);
		$myCartArray[$inputProductID] = $inputQuantity;
	}
	$_SESSION['mycart'] = $myCartArray;
}


$mycartquantity = 0;
if(isset($_SESSION['mycart']))
{
	$myCartArray2 = $_SESSION['mycart'];
	foreach($_SESSION['mycart'] as $key=>$value)
	{
		$mycartquantity = $mycartquantity+$value;
	}
}
echo "(" . $mycartquantity . ")";
?>