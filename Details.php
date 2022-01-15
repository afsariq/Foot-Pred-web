<?php

session_start();

?>
<html>
<head>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 200px;
  margin:30px;
}

.card:overlay {
 
  opacity:1;
}

h5{
	
	color:red;
	font-size:20px;
}

.container {
  padding: 2px 16px;
}
.registerbtn {
  background-color: #04AA6D;
  color: white;

  border: none;
  cursor: pointer;
  width: 180px;
  opacity: 0.9;
}
input[type=text]{
  width:180px;
 
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
</style>
<title></title>
</head>

<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="home.php">
    <img src="logo.png" alt="logo" style="width:50px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Contact Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Leader Board</a>
    </li>
	
	
  </ul>
</nav>
<br>
<br>
<h2> Good luck <?php echo $_SESSION['username']?></h2>

<center>
<?php


$id =$_SESSION["Mid"];
echo '<form action=""method="post">

	 <input type="Text"  name="pred" ><br>

	 
   <input type="submit" value="Submit" name="submit" class="registerbtn"></center> 
  
   </form>'

?>
<?php


   
 





$name =$_SESSION['username'];



$con=mysqli_connect("localhost", "root", "", "footpre");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM matches where Id=$id");

 $count = 0;

while($row = mysqli_fetch_array($result))
{
	 
           
			  
	   $s=$row['Image'];
		$d=$row['Match'];
		
		$_SESSION['Id'] = $row['Id'];
		
	 echo'<center><div class="card">
 <img src="image/'.$s.'" alt="HTML5 Icon" style="width:200px;height:200px">
  <div class="container">
   <center> <h4><b>'.$d.'</b></h4> 
   
  
   
   
   <p></p> 
  </div>
</div>

';



}




?>

<?php
if(isset($_POST['submit']))
{

$pre = $_POST['pred'];



// Set session variables
$_SESSION["pre"] = $pre;


   
   
   $id=$_SESSION['Id'];


      

$pre=$_SESSION["pre"];
	
$name=$_SESSION["username"];
		
	$conn = mysqli_connect("localhost", "root", "", "footpre");
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$queryy = "SELECT * FROM prediction WHERE MatchId=$id AND User='{$_SESSION['username']}'";

$resu = mysqli_query($conn, $queryy);
  	if (mysqli_num_rows($resu) != 0) {
  	  echo '<script>alert("You have already predicted the score for this match")</script>';
  	  //header('location: home.php');
  	}else {
  		$sql = "INSERT INTO `prediction`(`MatchId`, `User`, `Pre`) VALUES ($id,'{$_SESSION['username']}',$pre)";
mysqli_query($conn, $sql);
header('location: pre.php');
  	}






  	
		
		
	
   
   
	
}
?>
<br>
<br>
<center>
<h5>Tips: If the match is between Arsenal and Liverpool enter your prediction Like 1.2(Arsenal 1,Liverpool 2)<br> in the order of team names that given in the page
 

</body>
</html>