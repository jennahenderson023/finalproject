<html>
	<head>
	
	<h1> Add New Income Sheet </h1>
	
	</head>
	
	<body>
		<form method='post' action='createincomesheet.php'>
			<pre>
				TeamID: <input type='text' name='TeamID'>
				Type: <input type='text' name='Type'>
				Amount: <input type='text' name='Amount'>
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
	$Amount = $_POST['Amount'];
	$Year = $_POST['Year'];
	
	//echo $IncomeID.'<br>';
	
	$query = "INSERT INTO Income (TeamID, Type, Amount, Year) VALUES ('$TeamID', '$Type', '$Amount', '$Year')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: readincomesheets.php");
	
	
	
	
}



?>