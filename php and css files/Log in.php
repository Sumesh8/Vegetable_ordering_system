<!doctypehtml>
<?php
session_start();
if(isset($_POST['submit']))
{
	$conn =  new mysqli('localhost','root','','vegetablemanagementsystem');
		if($conn->connect_error) 
		{  
			die("Failed to connect with MySQL: ". mysqli_connect_error());  
		} 

		
			$index=$_POST['index'];
			$pwd=$_POST['pwd'];	
	
			$sql = "SELECT `pwd` FROM `userdata` WHERE `uname`='$index'";
			$query = $conn->query($sql);
			
			if ($query->num_rows > 0) {
  			// output data of each row
				$row = $query->fetch_assoc();
				
				if ($pwd==$row['pwd'])
				{
					echo"<script>alert('Log In successfully!')</script>";
					$_SESSION['userName']=$_POST["index"];
					
					$sql="insert into `usersession` (`ID`,`userName`) values ('','$index')";
					if ($conn->query($sql))
					{
						echo "done";
					}
					else
					{
						echo "not done";
					}
					
					$sql="select * from `usersession` where `userName`='$index'";
					$query = $conn->query($sql);
					
					if ($query->num_rows > 0)
					{
						$row=$query->fetch_assoc();
						
						$_SESSION['ID']=$row["ID"];
					}
					
								
				}
				else
				{
					echo'<script>alert("Password Incorrect")</script>';
					
				}
								
			} else {
				echo"<script>alert('Not a valid userName')</script>";
			}
	//close the connection
	mysqli_close($conn);
}
if (isset($_SESSION["userName"]))
{
	header("Location:home.php");
	
}
?>
<html>
<head>
	<title>Susadi Vegetables login </title>
	<link rel="stylesheet" type="text/css" href="Log in.css">
	<link rel="stylesheet" type="text/css" href="HdrNFtr.css">
	<script src="Log in.js"></script>
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
				</ul>
				</div>
			</div>
		</div>
		<!--Header ends -->
		
		<!--Body begins-->
		<div class = "bodyBox">
			<center>
				<br><br>
			<div class = "taBle">
			<table class = "Main_table">
			<tr>
				<th><p class = "L_in">Log in</p></th>	
			</tr>
			<tr>
				<td>
					<div class="image">
					<center><img src="Resources/logIn.png" alt="loginimage" length="050px" width="100px"></center> <br><br>
					</div>
					<div class="divform">
						<center>
						<form name="form1" action="" method="POST">	
							<div>
  							<input class="text" type="text" id="index" name="index" placeholder="User Name" required><br><br>
  							<input class="text" type="password" id="pwd" name="pwd" placeholder="Password" required><br><br>
  							</div>
							<input class="Button1" type="submit" value="Log in" name="submit">
							</form>
							<a href="Sign In.php"><input class="Button" type="submit" value="Sign in"></a>
						</center>
					</div>
				</td>
			</tr>
			</table>
			<br><br>
			</div>
			</center>
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