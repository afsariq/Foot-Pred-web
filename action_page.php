<?php

session_start();

?>


<?php

echo $_SESSION["Sscore"];
/*
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
echo "Connected successfully";


  
    $Id = $_POST["Id"];
	 $Score = $_POST["Score"];
          
  
$result = mysqli_query($conn,"SELECT * FROM predictions WHERE MatchId=$Id and Pre=$Score ");

 $count = 0;

while($row = mysqli_fetch_array($result))
{
  
   $s=$row['User'];
     $sql = "UPDATE `users` SET `Score`='10' WHERE username=$s";
  
        // Execute query
        mysqli_query($conn, $sql);
          
        // Now let's move the uploaded image into the folder: image
    
  }
  */
  
  ?>