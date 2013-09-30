<?php session_start();?>
<?php include 'dbparams.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Eastern Star</title>
<link rel="shortcut icon" href="../images/favicon.ico" >
<link rel="icon" type="image/gif" href="../images/favicon.ico" >
<link href="../styles/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../styles/superslides.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../scripts/jquery.easing.1.3.js"></script>
<script src="../scripts/jquery.animate-enhanced.min.js"></script>
<script src="../scripts/scripts.js"></script>
<script src="../scripts/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>
<script>
  $(function() {
    $('#slides').superslides({
      inherit_width_from: '.wide-container',
      inherit_height_from: '.wide-container'
    });
  });
</script>
<script type="text/javascript">
	renderCart();
</script>
</head>
<body>
<div id="container">
	<div id="topSection">
		<table id="topSectionTable">
			<tr>
				<td style="width:200px;">
					<a href="../index.php"><img alt="Eastern Star" src="../images/logo.png" style="width:250px;"></a>
				</td>
			</tr>
			<tr>
				<td style="width:220px;"></td>
				<td style="width:900px;text-align:center;vertical-align:middle;">
					<table>
						<tr>
							<td style="width:45px;"></td>
							<td style="width:100px;">
								<a href="#">About Us</a>
							</td>
							<td style="width:100px;">
								<a href="allprods.php">Products</a>
							</td>
							<td style="width:100px;">
								<a href="contactus.php">Contact Us</a>
							</td>
						</tr>
					</table>
				</td>
				<td style="width:200px;text-align:right;">
					<table style="text-align:right;">
						<tr>
							<td style="width:75%;text-align:right;"><a href="ordersummary.php">My Cart</a></td>
							<td style="width:15%;text-align:right;">
								<a href="ordersummary.php">
								<span style="color: #76792E;" id="myCartCount">
									<?php									
									$mycartquantity = 0;
									if(isset($_SESSION['mycart']))
									{
										$myCartArray = $_SESSION['mycart'];
										$first_key = key($myCartArray);
										if ($first_key > 0)
										{
											foreach($_SESSION['mycart'] as $key=>$value)
											{
												$mycartquantity = $mycartquantity+$value;
											}
										}
									}
									
									echo "(" . $mycartquantity . ")";
									?>
								</span>
								</a>
							</td>
							<td style="width:10%;text-align:right;vertical-align:middle;">
								<a href="ordersummary.php">
								<img alt="My Cart" src="../images/shoppingcart.png" style="vertical-align:middle;">
								</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<div id="topStrip">
		<img alt="Strip" src="../images/Header-Strip.png" style="width: 1020px;">
	</div>
	<div>
		<table id="mainSection" style="padding-right: 10px;padding-bottom: 10px;">
			<tr>
				<td style="text-align: right;" colspan="2">
					<input type="button" value="Complete Order" onclick="location.href='placeOrder.php';">
				</td>
			</tr>
			<tr>
				<td style="width:15%;text-align:center;vertical-align: top; padding-top: 10px;">
					<form action="prodcatone.php" method="post">
					<table id="productCat" style="margin-left:10px;">
						<tr>
							<th><span style="margin-left: 10px;">Top Categories</span></th>
						</tr>
						<tr>
							<td style="height: 200px; ">
								<div id="styledChecks">
								<?php
								// Create connection
								
								$connect=mysqli_connect($host,$username,$password,$db);
								
								// Check connection
								if (mysqli_connect_errno($connect))
								{
								  echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
								$result = mysqli_query($connect,"SELECT distinct(category) FROM es_product");
								$rows = 5;
								$idIncre = 1;
								for ($y=0; $y<$rows; $y++)
								{
								
									$row = mysqli_fetch_array($result);
									if ( isset($row['category']))
									{
										echo "<input id=\"" . $idIncre . "\" type=\"checkbox\" width=\"200px\" name=\"selection[]\" value=\"" . $row['category']."\">
										<label for=\"" . $idIncre . "\">" . $row['category'] . "</label><br />";
										$idIncre++;
									}
								}
								mysqli_close($connect);
								?>
								</div>
							</td>
						</tr>
						<tr>
							<td style="height: 25px; text-align: right; padding-right: 10px;">
							<input type="submit" value="Search" style="font-size: 20px">
							</td>
						</tr>
					</table>
					</form>
                    </td>
                    <td style="width:80%;vertical-align:top;">
                    	<div class="scrollSection">
                    	<table id="prodSummary">
                    		
						</table>
                   		</div>
                    </td>
			</tr>
			<tr>
				<td style="text-align: right;" colspan="2">
					<input type="button" value="Complete Order" onclick="location.href='placeOrder.php';">
				</td>
			</tr>
		</table>
	</div>
	<div id="contactSection">
		<table style="padding-top: 20px;padding-bottom: 10px; width: 100%">
			<tr>
				<td style="width: 23%;text-align: right;">
					<span style="color: #C2C26B;font-size: 16px;">CONTACT</span>
					<br><br>
					<span style="color: white;font-size: 14px;">
					HIG-22, Bijay Vihar<br>Chandrasekharpur<br>Bhubaneshwar<br>Odisha<br>
					+918763149192<br>info@easternstar.com</span> 
				</td>
			</tr>
			<tr>
				<td style="width: 23%;text-align: right;">
				</td>
				<td style="width: 77%;text-align: right;padding-right: 30px;">
					<span style="font-size: 15px;color: white;">Powered by </span>
					<a href="http://www.lineardotz.com" target="_blank">
						<img alt="Linear Dotz" src="../images/logo3.png" width="40px">
					</a>
				</td>
			</tr>
		</table>
	</div>
</div>
<div id="overlay">
     
</div>
</body>
</html>