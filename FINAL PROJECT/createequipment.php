<html>
	<head>
	
	<h1> Add New Equipment </h1>
	
	</head>
	
	<body>
		<form method='post' action='createequipment.php'>
			<pre>
				TeamID: <input type='text' name='TeamID'>
				Type: <input type='text' name='Type'>
				Annual Cost: <input type='text' name='Annual_cost'>
				Year: <input type='text' name='Year'>
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
if(isset($_POST['TeamID'])) 
{
	//Get data from POST object
	$TeamID = $_POST['TeamID'];
	$Type = $_POST['Type'];
	$Annual_cost = $_POST['Annual_cost'];
	$Year = $_POST['Year'];
	
	//echo $EquipmentID.'<br>';
	
	$query = "INSERT INTO Equipment (TeamID, Type, Annual_cost, Year) VALUES ('$TeamID', '$Type', '$Annual_cost', '$Year')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: readequipment.php");
	
	
	
	
}



?>