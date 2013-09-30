<?php session_start();?>
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
<script src="../scripts/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>
<script>
  $(function() {
    $('#slides').superslides({
      inherit_width_from: '.wide-container',
      inherit_height_from: '.wide-container'
    });
  });
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
								<a href="#">Contact Us</a>
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
								</span></a></td>
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
		<table id="mainSection" style="width: 100%; padding-top: 10px; padding-bottom: 10px;">
			<tr>
				<td style="width:21%;text-align:center;vertical-align: top; padding-top: 10px;">
				</td>
				<td style="vertical-align:middle;"> 
					<form class="form2" id="contactForm">

			<div class="input">
				<div class="inputtext">Your Name: </div>
				<div class="inputcontent">

					<input type="text" required="required" name="fname" id="fname" title="Please fill your name"/>

				</div>
			</div>

			<div class="input">
				<div class="inputtext">Your Number: </div>
				<div class="inputcontent">
					<input type="text" title="Please fill in this format: 9999999999" pattern="\d*" required="required" maxlength="10" name="pnumber" id="pnumber"/>
				</div>
			</div>

			<div class="input">
				<div class="inputtext">Your Email: </div>
				<div class="inputcontent">

					<input type="text" required="required" name="email" id="email" title="Please fill your email address"/>

				</div>
			</div>

			<div class="inputtextbox nobottomborder">
				<div class="inputtext">Message: </div>
				<div class="inputcontent">

					<textarea class="textarea" required="required" name="alltext" id="alltext" title="Please fill your comments"></textarea>

				</div>
			</div>

			<div class="buttons">
				
				<input class="sendButton" type="submit" id="submitButton"  name="submitButton" value="Send" />
				<input class="resetButton" type="reset" value="Reset" />
			</div>

		</form>
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
</body>
</html>