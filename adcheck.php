<?php


  session_start(); 



echo $_SESSION['username'];




$con=mysqli_connect("localhost", "root", "", "footpre");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM `users` where username ='{$_SESSION['username']}'");
 $count = 1;

while($row = mysqli_fetch_array($result))
{
	
	$type=$row['Type'];
	
	echo $type;
	
	if($type =="admin"){
		
		  	  header('location: admin.php');
		
	}
	
	else{
		  	  echo '<script>alert("only admin can access to this page")</script>';
  	 
	}
	
}

	




?>