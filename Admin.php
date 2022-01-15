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
  <a href="admin.php" class="active">Add Match</a>
   <a href="Delete.php">Delete Matches</a>
   <a href="#clients">Show Matches</a>
    
	
	<a href="Admindel.php">Score Update</a>
   <a href="Home.php">Logout</a>
</div>

<div class="main">
<center><h2>Add Match</h2></center>
<?php
error_reporting(0);
?>
<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
 $Match = $_POST['Match'];
    $Date = $_POST['Date'];
	$Id = $_POST['Id'];
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "image/".$filename;
		
	$db = mysqli_connect("localhost", "root", "", "footpre");

		// Get all the submitted data from the form
		$sql = "INSERT INTO matches VALUES ('$Match','$Date','$filename','$Id')";

		// Execute query
		mysqli_query($db, $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}
$result = mysqli_query($db, "SELECT * FROM image");
while($data = mysqli_fetch_array($result))
{

	?>
<img src="<?php echo $data['Filename']; ?>">

<?php
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" type= "text/css" href ="style.css"/>
<div id="content">

<form method="POST" action="" enctype="multipart/form-data">

	  <label for="email"><b>Match</b></label>
    <input type="text" placeholder="Example: Arsenal vs Liverpool" name="Match" id="Match" required>
	
	<label  for="date"><b>DATE</b></label>
    <input type="text" placeholder="Enter Match Date" name="Date" id="Date" required>
	
	<label for="id"><b>Match ID</b></label>
    <input type="text" placeholder="Enter Match Id" name="Id" id="Id" required>

	<label for="image"><b>Select Image</b></label><br>
	<input type="file" name="uploadfile" class="inputfile" style="width:200px" />
		
	<div>
		<button type="submit" class="registerbtn" name="upload">UPLOAD</button>
		</div>
</form>
</div>
</body>
</html>

   
</body>
</html> 
