<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<html>
<head>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<style>

footer {
	  position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
  text-align: center;
  padding: 3px;
  background-color: #141f1f;
  color: white;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 200px;
  margin:30px;
}

.card:overlay {
 
  opacity:1;
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
  <a class="navbar-brand" href="Home.php">
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
      <a class="nav-link" href="LB.php">Leader Board</a>
    </li>
	
	<li class="nav-item" align="right">
	  
  </ul>
</nav>


<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
	<br><br>
    	<h2>Welcome <strong><?php echo $_SESSION['username'];

		

		?></strong></h2>
    	<!--<p> <a href="home.php?logout='1'" style="color: red;">logout</a> </p> -->
    <?php endif ?>
</div>
		

<table align="center">

<?php
$con=mysqli_connect("localhost", "root", "", "footpre");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM matches");

 $count = 0;

while($row = mysqli_fetch_array($result))
{
	 if($count==4) //three images per row
            {
               print "</tr>";
               $count = 0;
            }
            if($count==0)
               print "<tr>";
            print "<td>";
			?>
			  <?php
	   $s=$row['Image'];
		$d=$row['Match'];
		$r=$row['Id'];
		
		$_SESSION['Id'] = $row['Id'];
	 echo'<div class="card">
 <img src="image/'.$s.'" alt="" style="width:200px;height:200px">
  <div class="container">
   <center> <h4><b>'.$d.'</b></h4> 
    <center> <h4><b>'.$r.'</b></h4> 
	  
  
 
   
   <p></p> 
  </div>
</div>';







// Set session variables
$_SESSION["Mid"] = $r;



	
?>
<center>
  <form action="" method="post">
   <input type="submit" value="Preview" name="pre" class="registerbtn"></center> 
   <input   name="id"  value="<?php echo $r?>" type="hidden"><br>
  
  
   </form>
   
   
<?php
if(isset($_POST['pre']))
{

$id = $_POST['id'];



// Set session variables
$_SESSION["Mid"] = $id;

	header('location: details.php');
}
?>
 <?php
            $count++;
            print "</td>";
        }
        if($count>0)
           print "</tr>";
        ?>
		
		
</table>
  
  
   <footer>
 
  <center><table><tr>
 <td><a href="home.php?logout='1'" style="color: red;">logout</a> </td>
  <td>
      <a class="nav-link" href="adcheck.php">Admin</a> </td></tr>
    
</footer> 
</body>
</html>
