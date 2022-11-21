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
$custName = "";
$vegiID = 0;
if (isset($_POST['submitcustom'])){ 
$custName = $_POST["txtarea1"];
$vegiName = $_POST["txtarea2"];
$sql = "select * from `vegetable` where `vegetableName`='$vegiName'";
$query = $conn->query($sql);
					
if ($query->num_rows > 0){
	$row=$query->fetch_assoc();
	$vegiID=$row["VegiID"];
}
echo $vegiID;
}
?>


<html>
<head>
	<title>Susadi Vegetable wholesalers and distributors</title>
	<link rel="stylesheet" type="text/css" href="orderdt.css">
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
					<a class = "current" href = "orderdt.php"> <li>Order Details</li></a>
					<a href = "customerdt.php"><li>Customer Details</li></a>
					<a href = "Messages.php"><li>Messages</li></a>
                    </div>
				</ul>
				</div>
			</div>
		</div>
		<!--Header ends -->
		<!--Body begins-->
		<div class = "bodyBox"><br>
		<div class="dscption">
		<div class="sliders">
		<form action="orderdt.php" method="POST">
		    <div class="selector">					
				<div class="tuple">
					<div class="Type"><br>User Name</div>
					<div class="Colon"><br>:</div>
					<div class="radio">
						<textarea name="txtarea1" id="txt1" rows="1" cols="50" placeholder="Enter user name"></textarea>
					</div><br>
				</div>
			</div>
			<div class="selector">					
				<div class="tuple">
					<div class="Type">Vegetable</div>
					<div class="Colon">:</div>
					<div class="radio">
						<textarea name="txtarea2" id="txt1" rows="2" cols="50" placeholder="Enter vegetable"></textarea>
					</div><br>
				</div>
			</div>
			
			<div class="sbmtcstm">
				<center><input type="submit" name="submitcustom" value="Search"></center>
			</div><br><br>
		</form>
		</div>
		</div>
		    <br>
			<div class="heading"> <h2>Display Orders </h2> </div><br>				
			<div class="orderTable"> 
			<table class ="table1">
			<tr>
			<th>Order ID</th>
			<th>Order Product</th>
			<th>Product Image</th>
			<th>User Name</th>
			<th>Quantity</th>
			<th>Amount</th>
			<th>Instruction</th>
			<th>Payment Method</th>
			<th>Address</th>
			<th>Contact Number</th>
	
			
			</tr>
				<?php
                // Create connection
                $conn = new mysqli('localhost','root','','vegetablemanagementsystem');
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql1="SELECT *FROM ordervegetable";
                $result1=$conn->query($sql1);
				if($result1->num_rows>0){
					while($row1 = $result1-> fetch_assoc()){
						if($custName=="" && $vegiID==0){
						echo "<tr><td>".$row1["OrderID"]."</td>";
						$sql2="SELECT *FROM vegetable";
                        $result2=$conn->query($sql2);
						while($row2 = $result2-> fetch_assoc()){
							if($row1["VegiID"]==$row2["VegiID"]){
							    echo "<td>".$row2["vegetableName"]."</td><td>".'<img src="'; echo $row2['Image']; echo'" width="150px;" heigh="150px;" alt="#">'."</td>";
							}
						}
					    echo "<td>".$row1["userName"]."</td><td>" .$row1["qty"]."</td><td>" .$row1["amount"]."</td><td>" .$row1["instruction"]."</td>";
						$sql3="SELECT *FROM orderpayment";
                        $result3=$conn->query($sql3);
						while($row3 = $result3-> fetch_assoc()){
							if($row1["OrderID"]==$row3["OrderID"]){
							    echo "<td>".$row3["paymethod"]."</td>";
							}
						}
						$sql="SELECT *FROM orderdelivery";
                        $result4=$conn->query($sql);
						while($row4 = $result4-> fetch_assoc()){
							if($row1["OrderID"]==$row4["OrderID"]){
							    echo "<td>".$row4["Address1"]."<br>".$row4["Address2"]."<br>".$row4["City"]."</td><td>".$row4["Mobilenumber"]."</tb></tr>";
							}
						}
						}
						
						else if ($custName==""){
							if($row1["VegiID"]==$vegiID){
								echo "<tr><td>".$row1["OrderID"]."</td>";
						        $sql2="SELECT *FROM vegetable";
                                $result2=$conn->query($sql2);
						        while($row2 = $result2-> fetch_assoc()){
							        if($row1["VegiID"]==$row2["VegiID"]){
							            echo "<td>".$row2["vegetableName"]."</td><td>".'<img src="'; echo $row2['Image']; echo'" width="150px;" heigh="150px;" alt="#">'."</td>";
							        }
						        }
					            echo "<td>".$row1["userName"]."</td><td>" .$row1["qty"]."</td><td>" .$row1["amount"]."</td><td>" .$row1["instruction"]."</td>";
						        $sql3="SELECT *FROM orderpayment";
                                $result3=$conn->query($sql3);
						        while($row3 = $result3-> fetch_assoc()){
						     	if($row1["OrderID"]==$row3["OrderID"]){
							             echo "<td>".$row3["paymethod"]."</td>";
						    	}
					    	    }
					    	    $sql="SELECT *FROM orderdelivery";
                                $result4=$conn->query($sql);
					    	    while($row4 = $result4-> fetch_assoc()){
						        	if($row1["OrderID"]==$row4["OrderID"]){
							            echo "<td>".$row4["Address1"]."<br>".$row4["Address2"]."<br>".$row4["City"]."</td><td>".$row4["Mobilenumber"]."</tb></tr>";
							        }
				     		    }
					    	}	
						}
						
						else if ($vegiID==0){
							if($row1["userName"]==$custName){
								echo "<tr><td>".$row1["OrderID"]."</td>";
						        $sql2="SELECT *FROM vegetable";
                                $result2=$conn->query($sql2);
						        while($row2 = $result2-> fetch_assoc()){
							        if($row1["VegiID"]==$row2["VegiID"]){
							            echo "<td>".$row2["vegetableName"]."</td><td>".'<img src="'; echo $row2['Image']; echo'" width="150px;" heigh="150px;" alt="#">'."</td>";
							        }
						        }
					            echo "<td>".$row1["userName"]."</td><td>" .$row1["qty"]."</td><td>" .$row1["amount"]."</td><td>" .$row1["instruction"]."</td>";
						        $sql3="SELECT *FROM orderpayment";
                                $result3=$conn->query($sql3);
						        while($row3 = $result3-> fetch_assoc()){
						     	if($row1["OrderID"]==$row3["OrderID"]){
							             echo "<td>".$row3["paymethod"]."</td>";
						    	}
					    	    }
					    	    $sql="SELECT *FROM orderdelivery";
                                $result4=$conn->query($sql);
					    	    while($row4 = $result4-> fetch_assoc()){
						        	if($row1["OrderID"]==$row4["OrderID"]){
							            echo "<td>".$row4["Address1"]."<br>".$row4["Address2"]."<br>".$row4["City"]."</td><td>".$row4["Mobilenumber"]."</tb></tr>";
							        }
				     		    }
							}
						}
						else {
							if($row1["userName"]==$custName && $row1["VegiID"]==$vegiID){
								echo "<tr><td>".$row1["OrderID"]."</td>";
						        $sql2="SELECT *FROM vegetable";
                                $result2=$conn->query($sql2);
						        while($row2 = $result2-> fetch_assoc()){
							        if($row1["VegiID"]==$row2["VegiID"]){
							            echo "<td>".$row2["vegetableName"]."</td><td>".'<img src="'; echo $row2['Image']; echo'" width="150px;" heigh="150px;" alt="#">'."</td>";
							        }
						        }
					            echo "<td>".$row1["userName"]."</td><td>" .$row1["qty"]."</td><td>" .$row1["amount"]."</td><td>" .$row1["instruction"]."</td>";
						        $sql3="SELECT *FROM orderpayment";
                                $result3=$conn->query($sql3);
						        while($row3 = $result3-> fetch_assoc()){
						     	if($row1["OrderID"]==$row3["OrderID"]){
							             echo "<td>".$row3["paymethod"]."</td>";
						    	}
					    	    }
					    	    $sql="SELECT *FROM orderdelivery";
                                $result4=$conn->query($sql);
					    	    while($row4 = $result4-> fetch_assoc()){
						        	if($row1["OrderID"]==$row4["OrderID"]){
							            echo "<td>".$row4["Address1"]."<br>".$row4["Address2"]."<br>".$row4["City"]."</td><td>".$row4["Mobilenumber"]."</tb></tr>";
							        }
				     		    }
							}
						}
                    }
				}
				else{
					echo "No Record found";
				}
         		$conn->close();		
                ?>
			</table>
			</div>
			<br>
			<div class="heading"> <h2>Card details </h2> </div><br>				
			<div class="cardTable"> 
			<table class ="table2">
			<tr>
			<th>Order ID</th>
			<th>User Name</th>
			<th>Card Number</th>
			<th>Expire Date</th>

			</tr>
			<?php
                // Create connection
                $conn = new mysqli('localhost','root','','vegetablemanagementsystem');
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
				}
			    $sql="SELECT *FROM carddetails";
                $result=$conn->query($sql);
			    if($result->num_rows>0){
				    while($row = $result-> fetch_assoc()){
						if($custName=="" ){
				            echo "<tr><td>".$row["OrderID"]."</td><td>".$row["userName"]."</td><td>".$row["CardNumber"]."</td><td>".$row["Mnth"]."/".$row["Year"]."</td></tr>";
						}
						else if($row["userName"]==$custName){
				            echo "<tr><td>".$row["OrderID"]."</td><td>".$row["userName"]."</td><td>".$row["CardNumber"]."</td><td>".$row["Mnth"]."/".$row["Year"]."</td></tr>";
						}
					}
				}
                else{
				    echo "No Record found";
			    }
			    $conn->close();		
                ?>			
			</table>
			<br>
			</div>
		</div>
		
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