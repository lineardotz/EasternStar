<?php include 'dbparams.php'; ?>
<?php
$input = " ";

$inputProductID = $_POST['productid'];

// Create connection
$connect=mysqli_connect($host,$username,$password,$db);

// Check connection
if (mysqli_connect_errno($connect))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$selectProducts = "SELECT prod.prodid as prodid,
									prod.prodcode as code, 
									prod.category as category, 
									prod.name as prodname, 
									prod.description as descr, 
									prod.displayprice as price, 
									prod.discount as discount, 
									prod.imgurl as img, 
									brand.name as brandname 
									FROM es_product as prod, es_brand as brand 
									where prod.prodid = " . $inputProductID . " 
									and prod.brandid = brand.brandid";
$selectProdAttributes = "select * from es_prod_attr where prodid = " .$inputProductID;




$result = mysqli_query ( $connect, $selectProducts );
$attriResult = mysqli_query($connect,$selectProdAttributes);

$rows = mysqli_num_rows($attriResult);

	$row = mysqli_fetch_array($result);
	$maxSelect = 201;
	if ( $row['prodid']<>0)
	{
		
	echo "
	<div>
	<a href=\"#\" title=\"Close\" id=\"close\" onclick=\"overlay(0)\">X</a>
	<table style=\"width:100%;\">
	<tr>
	<td style=\"vertical-align: top;width: 70%;\">
	<table id=\"productDetailsDisp\" style=\"width:100%;\">
	<tr>
	<td>
	<span id=\"textCat\">Brand</span>
	</td>
	<td>
	<span id=\"textContent\">".$row['brandname']."</span>
	</td>
	</tr>
	<tr>
	<td>
	<span id=\"textCat\">Category</span>
	</td>
	<td>
	<span id=\"textContent\">".$row['category']."</span>
	</td>
	</tr>
	<tr>
	<td>
	<span id=\"textCat\">Code</span>
	</td>
	<td>
	<span id=\"textContent\">".$row['code']."</span>
	</td>
	</tr>
	<tr>
	<td>
	<span id=\"textCat\">Description</span>
	</td>
	<td>
	<span id=\"textContent\">".$row['descr']."</span>
	</td>
	</tr>
	<tr>
	<td>
	<span id=\"textCat\">Price</span>
	</td>
	<td>
	<span id=\"textContent\">&#8377;". $row['price'] .".00</span>
	</td>
	</tr>
	<tr>
	<td>
	<span id=\"textCat\">Discount</span>
	</td>
	<td>
	<span id=\"textContent\">". $row['discount'] ."%</span>
	</td>
	</tr>";
	
	$idIncre = 1;
	for ($y=0; $y<$rows; $y++)
	{
	
		$attrRow = mysqli_fetch_array($attriResult);
		if ( isset($attrRow['name']))
		{
			echo "<tr>
					<td><span id=\"textCat\">" . $attrRow['name'] . "</span></td>
					<td><span id=\"textContent\">".$attrRow['value']."</span></td>
				  </tr>";
			$idIncre++;
		}
	}
	
	echo "</table>
	</td>
	<td style=\"vertical-align: top; text-align: right;\">
			<table id=\"productImageDisp\">
			<tr>
			<td>
			<img alt=\"Product\" src=\"../images/productcatalog/".$row['img']."\" border=\"1px solid #76792E\">
					</td>
					</tr>
					<tr>
     							<td>
	     							<span style=\"color: black;font-size:20px;font-weight:bold;\">".$row['prodname']."</span>
	     									</td>
	     											</tr>
	     											<tr>
	     											<td>
	     											<select id=\"selectQuantity\">
	     											<option selected=\"selected\" value=\"Select\">Quantity</option>";
	     											for($i = 1; $i < $maxSelect; $i++)
													{
														echo "<option value=\"" .$i. "\">". $i ."</option>";
													}
	     											
	     											echo "</select>
	     											</td>
	     											</tr>
	     											<tr>
	     											<td>
	     											<input type=\"button\" style=\"font-size: 20px\" value=\"Add to Cart\" onclick=\"addToCache(". $row['prodid'] . ");\">
	     											</td>
	     											</tr>
	     											<tr>
	     											<td>
     								<input type=\"button\" style=\"font-size: 20px\" value=\"Place Order\" onclick=\"location.href='ordersummary.php';\">
	     								</td>
	     								</tr>
	     								</table>
	     								</td>
	     										</tr>
	     												</table>
	     												</div>";
	}
	mysqli_close($connect);
?>