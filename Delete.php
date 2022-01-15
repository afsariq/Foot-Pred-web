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
   <a href="Delete.php" class="active">Delete Matches</a>
   <a href="#clients">Show Matches</a>
   <a href="Admindel.php">Score Update</a>
    
	
   <a href="Home.php">Logout</a>
</div>

<div class="main">
<center><h2>Delete Match</h2></center>



<form method="POST" action="" enctype="multipart/form-data">

	
	
	<label for="id"><b>Match ID</b></label>
    <input type="text" placeholder="Enter Match Id" name="Id" id="Id" required>

		
	<div>
		<button type="submit" class="registerbtn"  onclick="return confirm('Are you sure?')" value="Delete Match" name="delete">Delete Match</button>
		</div>
</form>

<?php
if(isset($_POST['delete'])){
	
	
	 $MatchId = $_POST['Id'];
	 
	 $db = mysqli_connect("localhost", "root", "", "footpre");

		// Get all the submitted data from the form
		$sql = "DELETE FROM `matches` WHERE Id=$MatchId";

		// Execute query
		mysqli_query($db, $sql);
	
}

?>
</div>
</body>
</html>
