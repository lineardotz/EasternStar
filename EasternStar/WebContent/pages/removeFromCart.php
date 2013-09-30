<?php

session_start();

$inputProductID = $_POST['productid'];
if(isset($_SESSION['mycart']))
{	
	$myCartArray = $_SESSION['mycart'];
	
	unset($myCartArray[$inputProductID]);	
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