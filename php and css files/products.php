<!doctype php>
<php>
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
<head>
	<title>Susadi Vegetables Products</title>
	<link rel="stylesheet" type="text/css" href="products.css">
	<link rel="stylesheet" type="text/css" href="HdrNFtr.css">
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
					<a href = "home.php"><li>Home</li></a>
					<a href = "aboutus.php"><li>About Us</li></a>
					<a class = "current" href = "products.php"><li>Products</li></a>
					<a href = "contactus.php"><li>Contact Us</li></a>
					<div class="adminpanels" <?php if($isAdmin== 0){ echo "style='display:none'"; } ?> >
					<a href = "orderdt.php"> <li>Order Details</li></a>
					<a href = "customerdt.php"><li>Customer Details</li></a>
					<a href = "Messages.php"><li>Messages</li></a>
				    </div>
				</ul>
			</div>
		</div>
		<!--Header ends -->
		
		<!--Body begins-->
		<div class = "bodyBox">
			<br>
			<div class="Category"> <h2>Carrot </h2> </div><br>
			<div class="Carrot">				
			<div class="C1">
				<img src="Resources/vegetables2/carrot/c1.jpg" id="c1" width="300px" height="250px">
				<h2>Baby Carrot(Small Carrot)</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="1" type="submit" value="Customize and Order"></form>
			</div>
				
			<div class="C2">
				<img src="Resources/vegetables2/carrot/c2.jpg" id="c2" width="300px" height="250px">
				<h2>Large Carrot</h2>
				
				<form action="Customize.php" method="POST"><input class = "Custo" name="2" type="submit" value="Customize and Order"></form>
			</div>

			<div class="C3">
				<img src="Resources/vegetables2/carrot/c3.jpg" id="c3" width="300px" height="250px">
				<h2>Red Carrot</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="3" type="submit" value="Customize and Order"></form>
			</div>
			</div><br><br>
			
			<div class="Category"> <h2>Cabbage</h2></div><br>
			<div class="Cabbage">
			<div class="Cb1">
				<img src="Resources/vegetables2/cabbage/cb1.jpg" id="cb1" width="300px" height="250px">
				<h2>Green Cabbage</h2>
				
				<form action="Customize.php" method="POST"><input class = "Custo" name="4" type="submit" value="Customize and Order"></form>
			</div>
				
			<div class="Cb2">
				<img src="Resources/vegetables2/cabbage/cb2.jpg" id="cb2" width="300px" height="250px">
				<h2>White Cabbage</h2>
				
				<form action="Customize.php" method="POST"><input class = "Custo" name="5" type="submit" value="Customize and Order"></form>
			</div>
				
			<div class="Cb3">
				<img src="Resources/vegetables2/cabbage/cb3.jpg" id="cb3" width="300px" height="250px">
				<h2>Red Cabbage</h2>
				
				<form action="Customize.php" method="POST"><input class = "Custo" name="6" type="submit" value="Customize and Order"></form>
			</div>
				
			</div><br><br>
			
			<div class="Category"> <h2>Leeks </h2> </div><br>
			<div class="Leeks">
			<div class="L1">
				<img src="Resources/vegetables2/leeks/l1.jpg" id="l1" width="300px" height="250px">
				<h2>Baby Leeks(Small Leeks)</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="7" type="submit" value="Customize and Order"></form>
			</div>
				
			<div class ="L2">
				<img src="Resources/vegetables2/leeks/l2.jpg" id="l2" width="300px" height="250px">
				<h2>Large Leeks</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="8" type="submit" value="Customize and Order"></form>
			</div>
				
			<div class="L3">
				<img src="Resources/vegetables2/leeks/l3.jpg" id="l3" width="300px" height="250px">
				<h2>Chinese Leeks</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="9" type="submit" value="Customize and Order"></form>
			</div>
				
			</div><br><br>
			
			<div class="Category"> <h2>Potato </h2> </div><br>
			<div class="Potato">
			<div class="P1">
				<img src="Resources/vegetables2/potato/p1.jpg" id="p1" width="300px" height="250px">
				<h2>White Potato</h2>		
				<form action="Customize.php" method="POST"><input class = "Custo" name="10" type="submit" value="Customize and Order"></form>
			</div>
				
			<div class="P2">
				<img src="Resources/vegetables2/potato/p2.jpg" id="p2" width="300px" height="250px">
				<h2>Yellow Potato</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="11" type="submit" value="Customize and Order"></form>
			</div>
				
			<div class="P3">
				<img src="Resources/vegetables2/potato/p3.jpg" id="p3" width="300px" height="250px">
				<h2>Red Potato</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="12" type="submit" value="Customize and Order"></form>
			</div>
			
			</div><br><br>
			
			<div class="Category"> <h2>Beans </h2> </div><br>
			<div class="Beans">
			<div class="B1">
				<img src="Resources/vegetables2/beans/b1.jpg" id="b1" width="300px" height="250px">
				<h2>Green Beans</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="13" type="submit" value="Customize and Order"></form>
			</div>
				
			<div class="B2">
				<img src="Resources/vegetables2/beans/b2.jpg" id="b2" width="300px" height="250px">
				<h2>White beans</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="14" type="submit" value="Customize and Order"></form>
			</div>
				
			<div class="B3">
				<img src="Resources/vegetables2/beans/b3.jpg" id="b3" width="300px" height="250px">
				<h2>Long beans</h2>
				<form action="Customize.php" method="POST"><input class = "Custo" name="15" type="submit" value="Customize and Order";></form>
			</div>

			</div> <br><br>	
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