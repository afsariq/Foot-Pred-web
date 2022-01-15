<?php

session_start();
   $id='10';
    $_SESSION[$id]='20';
	
   echo$_SESSION['10'];
/*		
	$conn = mysqli_connect("localhost", "root", "", "footpre");
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `prediction`(`MatchId`, `User`, `Pre`) VALUES ($id,$user,$pre)";
mysqli_query($conn, $sql);





  	
		
		
	
   */
   ?>


 
