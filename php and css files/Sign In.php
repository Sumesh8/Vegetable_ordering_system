<!doctype html>
<html>
<head>
	<title>Susadi Vegetables Sign-in</title>
	<link rel="stylesheet" type="text/css" href="Sign In.css">
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
				</ul>
				</div>
			</div>
		</div>
		<!--Header ends -->
		
		<!--Body begins-->
		<div class = "bodyBox">
			<br><br>
			<center>
			<table class = "Main_table">
			<tr>
				<th><p class = "S_in">Let's Setup Your Account</p></th>	
			</tr>
			<tr>
			<td>
				<div class="divform">
				<center>
				<form action=""  method="post">
				<input class="frmtext" type="text" id="name1" placeholder="First Name" name="fName" required><br><br>	
				<input class="frmtext" type="text" id="name2" placeholder="Last Name"  name="lName" required><br><br>	
				<input class="frmtext" type="text" id="uname" placeholder="UserName"  name="uname" required><br><br>
				<input class="frmtext" type="text" id="email" placeholder="Email Address"  name="email" required><br><br>	
				<input class="frmtext" type="date" id="dob" placeholder="Date of Birth"  name="dob" required>	<br><br>
				<input class="frmtext" type="text" id="mno" placeholder="Mobile Number"  name="mno" required><br><br>	
				<input class="frmtext" type="password" id="pwrd1" placeholder="Enter a password"  name="pwd" required>	<br><br>
				<input class="frmtext" type="password" id="pwrd2" placeholder="Re-enter the password"  name="rpwd" required>	<br><br>
				<input type="submit" class="sbmit" value="Submit" name="Submit" >	<br><br>	
				</form>	
					
	<?php 
		if (isset($_POST['Submit']))
		{
		//database connection
		$conn =  new mysqli('localhost','root','','vegetablemanagementsystem');
		if($conn->connect_error) 
		{  
			die("Failed to connect with MySQL: ". mysqli_connect_error());  
		} 


		//writing the sqls..

			if (isset($_POST['Submit']))
			{	

				//variable declaration
				$fname = $_POST['fName'];
				$lname = $_POST['lName'];
				$uname = $_POST['uname'];
				$email = $_POST['email'];
				$dob = $_POST['dob'];
				$mno = $_POST['mno'];
				$pwd = $_POST['pwd'];
				$rpwd = $_POST['rpwd'];
				$type = 0;
				

				$sql ="SELECT * FROM `userdata` WHERE `uname`='$uname'";
				$query = $conn->query($sql);
				
				if ($pwd==$rpwd)
				{
					if ($query->num_rows > 0 )
					{
						echo"<script>alert('Username Taken try a diffrent one..')</script>";
					}
					else
					{
						$sql="SELECT * FROM `userdata` WHERE `email`='$email'";
						$query = $conn->query($sql);
						
						if ($query->num_rows > 0 )
						{
							echo"<script>alert('Email is already register please use another one ')</script>";
						}
						
						else
						{
							$sql="INSERT INTO`userdata`(`userID`,`fName`, `lName`, `uname`, `email`, `dob`, `mno`, `pwd`, `rpwd`,`is_admin`) VALUES ('','$fname','$lname','$uname','$email','$dob','$mno','$pwd','$rpwd','$type')";
						
							if ($conn->query($sql))
							{
								echo"<script>alert(' successfully recorded')</script>";
							}
							else
							{
								echo"<script>alert('Error')</script>";
							}
						}
					}
				}
				else 
				{
					echo"<script>alert('Pasword mismatch')</script>";
				}
			}


				
				//close the connection
				mysqli_close($conn);
		}
	?>
					
					
				</center>
				</div>	
			</td>
			</tr>
			</table>	
			</center>
			<br><br>
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
			<div class = "fbox3"><h1 class = "header3"><center>Susadi Vegetable Signin</center></h1></div>
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