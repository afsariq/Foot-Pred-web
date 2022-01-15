
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

table {
  table-layout: fixed;
  width: 90%;
  border-collapse: collapse;
  border: 3px solid purple;
}

thead th:nth-child(1) {
  width: 30%;
}

thead th:nth-child(2) {
  width: 20%;
}

thead th:nth-child(3) {
  width: 15%;
}

thead th:nth-child(4) {
  width: 35%;
}

th, td {
  padding: 20px;
}
/* typography */

html {
  font-family: 'helvetica neue', helvetica, arial, sans-serif;
}

thead th, tfoot th {
  font-family: 'Rock Salt', cursive;
}

th {
  letter-spacing: 2px;
}

td {
  letter-spacing: 1px;
}

tbody td {
  text-align: center;
}

tfoot th {
  text-align: center;
}

thead, tfoot {
  background: url(leopardskin.jpg);
  color: white;
  text-shadow: 1px 1px 1px black;
}

thead th, tfoot th, tfoot td {
  background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.5));
  border: 3px solid purple;
}
/* zebra striping */

tbody tr:nth-child(odd) {
  background-color: #ff33cc;
}

tbody tr:nth-child(even) {
  background-color: #e495e4;
}

tbody tr {
 ////////////////// background-image: url(noise.png);
}

table {
  background-color: #ff33cc;
}

caption {
  font-family: 'Rock Salt', cursive;
  padding: 20px;
  font-style: italic;
  caption-side: bottom;
  color: #666;
  text-align: center;
  letter-spacing: 1px;
}


<link href="table.css" rel="stylesheet" type="text/css">
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
      <a class="nav-link" href="#">Leader Board</a>
    </li>
	
	
  </ul>
</nav>

<center>
<h1> Leader Board</h1>


<?php



$con=mysqli_connect("localhost", "root", "", "footpre");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM `users` ORDER BY Score DESC ");

 $count = 1;
echo'<table>
  <tr>
    <th>#</th>
    <th>UserName</th>
    <th>Score</th>
  </tr>';
while($row = mysqli_fetch_array($result))
{
	
	$uname=$row['username'];
	$score=$row['Score'];
	echo'
  <tr>
    <td>	'.$count.'</td>
    <td>'.$uname.'</td>
    <td>'.$score.'</td>
  </tr>';
//echo $row['username']; echo $row['Score'];

$count++;
	
}

	




?>
