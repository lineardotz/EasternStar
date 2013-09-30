<?php 
session_start();
?>
<?php include 'dbparams.php'; ?>
<?php

if(isset($_POST['name'])
	|| isset($_POST['address'])
	|| isset($_POST['phoneNo'])
	|| isset($_POST['email']))
	{
		date_default_timezone_set("Asia/Calcutta");
		$personName = $_POST['name'];
		$personAddress = $_POST['address'];
		$personPhoneNo = $_POST['phoneNo'];
		$personEmail = $_POST['email'];
		$orderDate = date('Y-m-d');
		$orderStatus = "New";
		$orderrefcode = nextOrderRef();
		$expDeliveryDate = Date('y:m:d', strtotime("+3 days"));
		$connect=mysql_connect($host,$username,$password);
		mysql_select_db($db,$connect);
		if (mysqli_connect_errno($connect))
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		$insertStatement = "insert into es_order (orderdate, 
													orderrefcode, 
													o_status,
													cusname,
													cusphone,
													cusemail,
													cusnotes,
													expdeldate) 
				values ('" . $orderDate . "',
						'" . $orderrefcode . "',
						'" . $orderStatus . "',
						'" . $personName . "',
						'" . $personPhoneNo . "',
						'" . $personEmail . "',
						'" . $personAddress . "',
						'" . $expDeliveryDate . "')";
		$retval = mysql_query($insertStatement);
		$orderId = mysql_insert_id($connect);
		$lineNumber = 1;
		foreach($_SESSION['mycart'] as $key=>$value)
		{
			$insertProdLine = "insert into es_order_line (orderid, linenum, prodid, quantity) 
				values ('" . $orderId . "', 
						'" . $lineNumber . "',
						'" . $key . "',
						'" . $value . "')";
			
			$retval1 = mysql_query($insertProdLine);
			if(! $retval1 )
			{
				die('Could not enter order line: ' . mysql_error());
			}
			$lineNumber++;
		}
		echo "<table id=\"successfulOrder\">
		<tr>
		<th colspan=\"2\">
		Order Placed Successfully
		</th>
		</tr>
		<tr>
		<td style=\"padding-left: 10px;\">
		<span style=\"color: #76792E;font-size: 18px;\">Order Reference Number: </span>
		</td>
		<td>
		<span style=\"color: #76792E;font-size: 18px;font-weight: bold;\">" . $orderrefcode . "</span>
		</td>
		</tr>
		<tr>
		<td>
		<table>
		 
		<tr>
		<td colspan=\"2\">
		<span style=\"color: #76792E;font-size: 18px;\">Shipping Address: </span>
		</td>
		
		</tr>
		<tr>
		<td>
		&nbsp;
		</td>
		<td>
			" . $personName . "
		</td>
		</tr>
		<tr>
		<td>
		&nbsp;
		</td>
		<td>
			" . $personAddress . "		
		</td>
		</tr>
		<tr>
		<td>
		&nbsp;
		</td>
		<td>
			" . $personPhoneNo . "
		</td>
		</tr>
		<tr>
		<td>
		&nbsp;
		</td>
		<td>
			" . $personEmail . "
		</td>
		</tr>
		</table>
		</td>
		<td>
		";
		$totalPriceInCart = $_SESSION['totalPrice'];
		$totalQuantityInCart = $_SESSION['totalQuantity'];
		echo "<table style=\"width: 100%;\">
										<tr>
											<td>
												<span style=\"color: #76792E;font-size: 18px;\">Total Price:</span>
											</td>
											<td><span style=\"color: #76792E;font-size: 18px;font-weight: bold;\">&#8377;"
				. $totalPriceInCart .
				".00</span></td>
										</tr>
										<tr>
											<td>
												<span style=\"color: #76792E;font-size: 18px;\">Total Items:</span>
											</td>
											<td><span style=\"color: #76792E;font-size: 18px;font-weight: bold;\">"
						. $totalQuantityInCart .
						"</span></td>
										</tr>
									</table>
									</td>
		                    		</tr>
		                    	</table>";
		mysql_close($connect);
	}
else 
{
	echo("All fields are mandatory");
}

?>
<?php
session_destroy();
?> 