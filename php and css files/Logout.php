<?php

session_start();
$conn =  new mysqli('localhost','root','','vegetablemanagementsystem');
		if($conn->connect_error) 
		{  
			die("Failed to connect with MySQL: ". mysqli_connect_error());  
		} 

$userName = $_SESSION["userName"];

$sql="DELETE FROM `usersession` WHERE `userName` ='$userName'";
if ($conn->query($sql))
{
	echo "";
}


session_unset();

session_destroy();

header("Location:Log in.php")
	

?>