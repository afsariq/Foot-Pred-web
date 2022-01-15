<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="dash.css">
<style>
label {
  
  color: grey;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 18px;
}
.inputfile {
	width: 100%;
	height: 40px;
	opacity: 10;
	
	z-index: -1;
}
</style>
</head>
<body>

<div class="sidenav">

<center> <img src="logo.png" href="home.php" alt="logo" style="width:100px;" ></center>
  <a href="admin.php" >Add Match</a>
    <a href="Delete.php" >Delete Match</a>
   <a href="#clients">Show Matches</a>
   
   <a href="admindel.php" class="active">Score Update</a>
    
   <a href="Home.php">Logout</a>
</div>

<div class="main">
<center><h2>Add Match</h2></center>

  <?php
  echo'
<form method="POST" action="">

	  

	
	<label for="id"><b>Match ID</b></label>
    <input type="text" placeholder="Enter Match Id" name="Id" id="Id" required>
	
		
	<label  for="date"><b>Score</b></label>
    <input type="text" placeholder="" name="Score" id="Score" required>

	
		
	<div>
		<button type="submit" class="registerbtn" name="upload">UPLOAD</button>
		</div>
</form>';
  
if (isset($_POST['upload'])) {
	
   $Sid = $_POST['Id'];
    $Sscore = $_POST['Score'];
	
	


$servername = "localhost";
$username = "root";
$password = "";
$db="footpre";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";


  
    $Id = $_POST["Id"];
	 $Score = $_POST["Score"];
          
  
$result = mysqli_query($conn,"SELECT * FROM prediction WHERE MatchId=$Id and Pre=$Score ");
 
while($row = mysqli_fetch_array($result))
{

   $_SESSION["upuser"]=$row['User'];
   echo   $_SESSION["upuser"];
  

$results = mysqli_query($conn,"SELECT Score FROM `users` WHERE username='{$_SESSION['upuser']}'");

while($rows = mysqli_fetch_array($results))
{
	 $_SESSION["Score"]=$rows['Score'];
		
     $sql = "UPDATE `users` SET `Score`='{$_SESSION['Score']}'+10 WHERE username ='{$_SESSION['upuser']}'";
  
        // Execute query
        mysqli_query($conn, $sql);
          
      
	   	unset($_SESSION['Score']);
	   
    
  }
  	unset($_SESSION['upuser']);
}

}
?> 
 </div>
   
</body>
</html> 
