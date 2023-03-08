<html>
	<head>
	
	<h1> Add New Team </h1>
	
	</head>
	
	<body>
		<form method='post' action='createteam.php'>
			<pre>
				Type: <input type='text' name='Type'>
				Email: <input type='text' name='Email'>
				Established Date: <input type='text' name='Established_date'>
				<input type='submit' value='Add Record'>
			</pre>
		</form>
	</body>
</html>


<?php
//import credentials for db
require_once  'login.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if ISBN exists
if(isset($_POST['Type'])) 
{
	//Get data from POST object
	$Type = $_POST['Type'];
	$Email = $_POST['Email'];
	$Established_date = $_POST['Established_date'];
	
	//echo $TeamID.'<br>';
	
	$query = "INSERT INTO Team (Type, Email, Established_date) VALUES ('$Type', '$Email', '$Established_date')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: readteamslist.php");
	
	
	
	
}



?>