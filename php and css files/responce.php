<!doctypehtml>
<?php
session_start();

if (!isset($_SESSION["userName"]))
{
	echo"<script>alert('Log in to continue to this page')</script>";
	header("Location:Log in.php");
}
else
{
	$username = $_SESSION["userName"];
	$id = $_SESSION['ID'];
}
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
?>		
<?php
	if (isset($_POST['sbmtcard']))
	{	//update the payment table............
		$conn =  new mysqli('localhost','root','','vegetablemanagementsystem');
		if($conn->connect_error) 
		{  
			die("Failed to connect with MySQL: ". mysqli_connect_error());  
		} 
							
		$sql="INSERT INTO `orderpayment`(`OrderID`, `paymethod`) VALUES ('$id','Card')";

		if ($conn->query($sql))
		{
			echo"<script>alert('Order Successfully recorded!')</script>";
		}else
		{echo 'error';}
		
		
		//updating card details...................
		$crdNo = $_POST['crd'];
		$mnth = $_POST['m'];
		$year = $_POST['y'];
		$cvv = $_POST['cvv'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		
		
		
		$sql="INSERT INTO `carddetails`(`userName`, `CardNumber`, `Mnth`, `Year`, `CVV`, `fName`, `lName`,`OrderID`) VALUES ('$username','$crdNo','$mnth','$year','$cvv','$fname','$lname','$id')";

		if ($conn->query($sql))
		{
			echo"<script>alert('Order Successfully recorded!')</script>";
		}
//close the connection
mysqli_close($conn);

}
?>
<?php
if(isset($_POST['sbmtcod']))
	{		
		$conn =  new mysqli('localhost','root','','vegetablemanagementsystem');
		if($conn->connect_error) 
		{  
			die("Failed to connect with MySQL: ". mysqli_connect_error());  
		} 
	
		$sql="INSERT INTO `orderpayment`(`OrderID`, `paymethod`) VALUES ('$id','COD')";
		if ($conn->query($sql))
		{
		echo"<script>alert('Order Successfully recorded!')</script>";
		}

						
//close the connection
mysqli_close($conn);
}
?>
<html>
<head>
	<title>Susadi Vegetables Responce</title>
	<link rel="stylesheet" type="text/css" href="responce.css">
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
					<a href = "products.php"><li>Products</li></a>
					<a href = "contactus.php"><li>Contact Us</li></a>
					<div class="adminpanels" <?php if($isAdmin== 0){ echo "style='display:none'"; } ?> >
					<a href = "orderdt.php"> <li>Order Details</li></a>
					<a href = "customerdt.php"><li>Customer Details</li></a>
					<a href = "Messages.php"><li>Messages</li></a>
				</ul>
				</div>
			</div>
		</div>
	
		<!--Header ends -->
		
		<!--Body begins-->
		<div class = "bodyBox"> <br>
			<center><h1 class="header1">Thank you for respons</h1></center>	
					<form action="Logout.php" method="POST">
						<div class="sbmt"><br><br>
							<center><input type="submit" name="submit" value ="OK"></center>
						<br><br></div>
					</form>
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