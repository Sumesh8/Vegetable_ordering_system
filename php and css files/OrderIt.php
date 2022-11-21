<!doctype html>
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
if (isset($_POST['submitcustom']))
{
$conn =  new mysqli('localhost','root','','vegetablemanagementsystem');
		if($conn->connect_error) 
		{  
			die("Failed to connect with MySQL: ". mysqli_connect_error());  
		} 
$vegiID = $_POST["vgid"];
$instruct = $_POST["txtarea2"];
$qty = (double)$_POST["txtarea1"];
$price = (double)$_POST["pfromdb"];
$amount= ($qty * $price);		
					
$sql="INSERT INTO `ordervegetable`(`ordVegID`, `VegiID`,`instruction`, `qty`, `amount`,`userName`,`OrderID`) VALUES ('','$vegiID','$instruct','$qty','$amount','$username','$id')";

if ($conn->query($sql))
{
	echo"<script>alert('Order Successfully recorded!')</script>";
}

}
?>


<head>
	<title>Susadi Vegetable Order</title>
	<link rel="stylesheet" type="text/css" href="OrderIt.css">
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
				</ul>
				</div>
			</div>
		</div>
		<!--Header ends -->
		
		<!--Body begins-->
		<div class = "bodyBox"><br>
			<div class="displyItem">
<?php
$conn =  new mysqli('localhost','root','','vegetablemanagementsystem');
		if($conn->connect_error) 
		{  
			die("Failed to connect with MySQL: ". mysqli_connect_error());  
		} 
	//getting data for vegetable details...................			
$sql = "select * from ordervegetable where OrderID='$id'";
$result = $conn->query($sql);
				
if ($result->num_rows > 0) 
{
  	// output data of each row
	while($row = $result->fetch_assoc())
	{
		
		$vegiID=$row["VegiID"];
		$instruct=$row["instruction"];
		$qty=$row["qty"];
		$amount=$row["amount"];	
		$orderID=$row["OrderID"];
			
	}
}
	
//getting data for image and Name...
$sql = "select * from vegetable where VegiID='$vegiID'";
$result = $conn->query($sql);
				
if ($result->num_rows > 0) 
{
  	// output data of each row
	while($row = $result->fetch_assoc())
	{
		
		$image=$row['Image'];
		$name=$row['vegetableName'];
			
	}

}
?>
				
			<div class="image">
				<center><div class="Name"><h2><?php echo $name;?></h2></div>	
				<div class ="photo"><img src= "<?php echo $image?>" height="250px" width="250px" alt="#"></div>	</center>
			</div>
				
			<div class="vertical"></div>
				
			<div class="data">

				<div class="total"><h3>Grand total : <?php echo $amount;?>.00</h3></div>
				<table class="preview">
					<td>Quantity</td>	
					<td>:</td>	
					<td><?php echo $qty;?></td>	
				</tr>
				<tr>
					<td>Instructions</td>	
					<td>:</td>	
					<td><?php echo $instruct;?></td>	
				</tr>
				</table>
				&nbsp;&nbsp;<form action="" method="POST"><input class="Submit" type="Submit" name="SUBmit" value="Remove"></form><br><br>
				<?php 
					if (isset($_POST['SUBmit']))
					{
						$sql = "DELETE FROM `ordervegetable` WHERE OrderID ='$id' ";
						
						if($conn-> query($sql))
						{
							echo"<script>alert('Successfully Removed!')</script>";
							header("Location:products.php");
						}
					}
				?>
			</div>
				
			</div>	
			<div class="displyDtail">
			<h3>Delivery Details</h3>
			<div class="delidtail">
			<form action="Payment.php" method="POST">
				<input type="text" class="insert" name="fName" placeholder="Name" required><br><br>
				<input type="text" class="insert" name="mno" placeholder="Mobile Number" required><br><br>
				<input type="text" class="insert" name="adrs1" placeholder="Address Line 1" required><br><br>
				<input type="text" class="insert" name="adrs2" placeholder="Address Line 2" ><br><br>
				<input type="text" class="insert" name="cty" placeholder="City" required><br><br><br>
				<input type="submit" class="Submit" value="Procede to Pay" name="submit" required><br><br>
			</form>
			</div>
		</div>
		</div>
		<footer>
		
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