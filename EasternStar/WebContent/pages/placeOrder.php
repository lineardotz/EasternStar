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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
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
	//renderCart();
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
                <td style="width:80%;vertical-align:top;">
                   <div id="scrollSection" class="scrollSection">
                    <table id="placeOrderSection">
                    	<tr>
                    		<td style="width: 70%">
                    			<form id="finalizeOrder">
                    			<table style="width: 100%">
                    				<tr>
                    					<td>
                    						<span style="font-size: 20px;color: #76792E;">Name:</span>
                    					</td>
                    					<td style="padding-left: 20px;">
                    						<input type="text" id="name" name="name" maxlength="256" style="width: 450px;" required="required" style="font-family: Myriad Pro;">
                    					</td>
                    				</tr>
                    				<tr>
                    					<td style="vertical-align: top;">
                    						<span style="font-size: 20px;color: #76792E;">Address:</span>
                    					</td>
                    					<td style="padding-left: 20px;">
                    						<textarea id="address" rows="5" name="address" cols="55" maxlength="256" required="required" style="font-family: Myriad Pro;"></textarea>
                    					</td>
                    				</tr>
                    				<tr>
                    					<td>
                    						<span style="font-size: 20px;color: #76792E;">Phone Number:</span>
                    					</td>
                    					<td style="padding-left: 20px;">
                    						<input type="text" id="phoneNo" name="phoneNo" style="width: 450px;" title="9999999999" pattern="\d*" required="required" maxlength="10" style="font-family: Myriad Pro;">
                    					</td>
                    				</tr>
                    				<tr>
                    					<td>
                    						<span style="font-size: 20px;color: #76792E;">Email Address:</span>
                    					</td>
                    					<td style="padding-left: 20px;">
                    						<input type="text" id="email" name="email" maxlength="256" style="width: 450px;" required="required" style="font-family: Myriad Pro;">
                    					</td>
                    				</tr>
                    				<tr>
                    					<td>
                    						&nbsp;
                    					</td>
                    					<td style="text-align: right;">
                    						<input type="submit" style="font-size: 20px;" value="Complete Order">
                    					</td>
                    				</tr>
                    			</table>
                    			</form>
                    		</td>
                    		<td style="width:40%;vertical-align:top; padding-left: 20px;">
			                   <?php 
			                   if (isset($_SESSION['totalPrice']) && isset($_SESSION['totalQuantity'])) {
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
										</table>";
			                   }
			                   else 
			                   {
			                   	echo "<table style=\"width: 100%;\">
											<tr>
												<td>
													<span style=\"color: #76792E;font-size: 18px;\">Cart Empty</span>
												</td>
											</tr>
										</table>";
			                   }
			                   	
			                   
			                   ?>
								
			                </td>
                    	</tr>
                    	
					</table>
                   </div>
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