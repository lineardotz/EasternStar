<?php 
session_start();
?>
<?php include 'dbparams.php'; ?>
<?php
if(isset($_SESSION['mycart']) && key($_SESSION['mycart']) > 0)
{
	$input = " ";
	// Create connection
	$connect=mysqli_connect($host,$username,$password,$db);
	if (mysqli_connect_errno($connect))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
					
	foreach($_SESSION['mycart'] as $key=>$value)
	{
		if(strcmp($input," " ) == 0)
		{
			$input .= "'" . $key . "'";
		}
		else
		{
			$input .= ",'" . $key . "'";
		}
	}
	
	$result = mysqli_query($connect,"SELECT * FROM es_product where prodid in (".$input.")");
	$rows = mysqli_num_rows($result);
	echo "<tr>
	<th colspan=\"2\" style=\"text-align: left;\">Name and Description</th><th>Quantity</th><th>Price</th><th width=\"10%\">&nbsp;</th>
	</tr>";
	$totalPrice = 0;
	$totalQuantity = 0;
	for ($y=0; $y<$rows; $y++)
	{
		$row = mysqli_fetch_array($result);
		if ( isset($row['prodid']))
		{
			$quantityOfItems = $_SESSION['mycart'][$row['prodid']];
			$itemPrice = $row['displayprice'] * $quantityOfItems;
			echo "
			<tr>
			<td width=\"10%\">
			<img alt=\"Product\" src=\"../images/productcatalog/". $row['imgurl'] . "\" width=\"90px\" style=\"border: 1px solid grey;\" >
			</td>
			<td width=\"50%\">
			<span id=\"textContent\">" . $row['name'] . "</span><br><span id=\"textCat\">" . $row['description'] . "</span>
			<br><a href=\"#\" onclick=\"overlay(". $row['prodid'] . ");\"><span style=\"color: #76792E;font-size: 10px;\">Click to update</span></a>
			</td>
			<td width=\"10%\" style=\"text-align: center;\">
			<span id=\"textCat\">" . $quantityOfItems . "</span>
			</td>
			<td width=\"20%\" style=\"text-align: center;\">
			<span id=\"\priceText\" style=\"font-size: 16px;\">&#8377;" . $itemPrice . ".00</span>
			</td>
			<td width=\"10%\" style=\"text-align: center;\">
			<a href=\"#\" onclick=\"removeFromCart(". $row['prodid'].");\"><span style=\"color: #76792E;font-size: 12px;\">Remove</span></a>
			</td>
			</tr>";
			if (!($y == ($rows - 1)))
			{
				echo "<tr>
			<td colspan=\"5\" style=\"text-align: center;\">
			<img alt=\"\" src=\"../images/row_back.png\" width=\"95%\" height=\"5px\">
			</td>
			</tr>";
			}
			$totalPrice = $totalPrice + $itemPrice;
			$totalQuantity = $totalQuantity + $quantityOfItems;
		}
	}
	$_SESSION['totalPrice'] = $totalPrice;
	$_SESSION['totalQuantity'] = $totalQuantity;
	echo "<tr>
			<td id=\"prodTotal\" colspan=\"3\" style=\"text-align: right;padding-right: 20px;\">Order Total</td>
			<td id=\"prodTotal\" style=\"text-align: center;\">&#8377;" . $totalPrice . ".00</td>
			<td id=\"prodTotal\">&nbsp;</td>
		</tr>";
	
	mysqli_close($connect); 
}
else 
{
	echo "<tr>
			<td height=\"200px;\" style=\"text-align: center;vertical-align:middle;\">
				<span style=\"font-size:36px;font-weight:bold;color:#76792E;\">
					Cart is empty
				</span>
			</td>
		</tr>";
	session_destroy();
}
?>