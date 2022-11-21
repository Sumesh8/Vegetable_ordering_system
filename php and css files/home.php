<!doctype html>
<?php
session_start();
if (isset($_SESSION["userName"]))
{
	$username = $_SESSION["userName"];
	$id = $_SESSION['ID'];
	// Create connection
    $conn = new mysqli('localhost','root','','vegetablemanagementsystem');
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "select * from `userdata` where `uname`='$username'";
    $query = $conn->query($sql);
					
    if ($query->num_rows > 0){
	    $row=$query->fetch_assoc();
	    $isAdmin=$row["is_admin"];
    }
}
else {$isAdmin = 0;}

?>
<html>
<head>
	<title>Susadi Vegetable wholesalers and distributors</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet" type="text/css" href="HdrNFtr.css">
	<script src="home.js"></script>
</head>
	
<body>
	
    <div class = "container">
		<!--Header begins -->
		<div class = "headBox">
			<div class = "upperbox">
					<div class = "logoBox">
					<!-- Logo in the corner of the web site-->
						<center>
						<a href = "home.php"><img src ="Resources/logo.jpg" alt = "logo" width="150px" height="150px"></a>
						</center>
					</div>
				
					<!-- shop name and motto -->
					<div class = "nameBox"> 
					    <center>
						<h1 class = "header1">Susadi Vegetable wholesalers and distributors </h1>
						<h3 class ="header2">we help you to find fresh vegetables</h3>
						</center>
					</div>
				
					<!-- Log in and sign in -->
					<div class = "logBox">
						<center>
						<img class = "logIcon" src ="Resources/logIn.png" alt = "logo" width="100px" height="100px"><br>
						<a href="Log in.php"><button class = "logIn"  type="button" >Log in</button></a>
						<form action="Logout.php"><input type="submit" class = "signIn" value="Log Off" name="logoff"></form>
						</center>
					</div>
			</div>
			<!--Navigation panel -->
			<div class = "lowerbox"> 
				<div class = "links">
				<ul class = "nav"> 
					<a class = "current" href = "home.php"><li>Home</li></a>
					<a href = "aboutus.php"><li>About Us</li></a>
					<a href = "products.php"><li>Products</li></a>
					<a href = "contactus.php"><li>Contact Us</li></a>
					<div class="adminpanels" <?php if($isAdmin== 0){ echo "style='display:none'"; } ?> >
					<a href = "orderdt.php"> <li>Order Details</li></a>
					<a href = "customerdt.php"><li>Customer Details</li></a>
					<a href = "Messages.php"><li>Messages</li></a>
                    </div>
				</ul>
				</div>
			</div>
		</div>
		<!--Header ends -->
		
		<!--Body begins-->
		<div class = "bodyBox">
				<div class = "slides"><br><br>
					<img class="imgSlider" id="pic" src="Resources/vegetables/1.jpg" alt="">
					<br>	
					<center>
					<div class="picNavigator">
					<!-- Input radio buttons -->
					<lable class = "rbtn"><input class="radioBtn" type="button"  onclick="loadData('b1');" name= "radio-btn" id="radio1"><span></span></lable>
					<lable class = "rbtn"><input class="radioBtn" type="button"  onclick="loadData('b2');" name= "radio-btn" id="radio2"><span></span></lable>
					<lable class = "rbtn"><input class="radioBtn" type="button"  onclick="loadData('b3');" name= "radio-btn" id="radio3"><span></span></lable>
					<lable class = "rbtn"><input class="radioBtn" type="button"  onclick="loadData('b4');" name= "radio-btn" id="radio4"><span></span></lable>
					<lable class = "rbtn"><input class="radioBtn" type="button"  onclick="loadData('b5');" name= "radio-btn" id="radio5"><span></span></lable>
					<!--radio button ends -->
					</div>
					</center>
					<br><br>
				</div>
				
			
				
		</div>
		<!--Body Ends -->
		
		<!--Footer begins -->
		<footer>
		
		<div class = "footBox">
			<div class = "fbox1"> Susadi Vegetable wholesalers and distributors <br> Tel : +94 71 222 2233 <br> Tel: 052 222 2233 <br> Address : Susadi Vegetables,Economic Center,Nuwara eliya</div>
			<div class = "fbox2">
				<center>
				<div class = "vline"></div>		
				</center>
			</div>
			<div class = "fbox3"><h1 class = "header3"><center>Susadi Vegetable wholesalers and distributors</center></h1></div>
			<div class = "fbox4">
				<center>
				<div class = "vline"></div>
				</center>
			</div>
			<!-- Social Media logos -->
			<div class = "fbox5">
			<div class = "slogo">
			<br> <br>
			<div class = "fb"> 
				<br>
				<a href = "https://www.facebook.com">
				<img src = "Resources/facebook.png" alt = "fb logo" width = "40px" height = "40px">
				</a>
			</div>
			<div class = "inst"> 
				<br>
				<a href = "https://instagram.com">
				<img src = "Resources/instagram.png" alt = "insta logo" width = "40px" height = "40px">
				</a>
			</div>
			<div class = "twtr">
				<br>
				<a href = "https://www.twitter.com">
				<img src = "Resources/twitter.png" alt = "twtr logo" width = "40px" height = "40px">
				</a>
			</div>
			<center>
			<div class = "g">
				<br>
				<a href = "https://www.googleplus.com">
				<img src = "Resources/google-plus-logotype.png" alt = "g+ logo" width = "40px" height = "40px">
				</a>
 			</div>
			</center>
				</div>
			</div>
		</div>
		
		</footer>
		<!-- Footer finished-->	
	</div>	
</body>	
</html>	