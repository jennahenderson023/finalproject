<html>
	<head>
	
	<h1> Add New Athlete </h1>
	
	</head>
	
	<body>
		<form method='post' action='createathletes.php'>
			<pre>
				TeamID: <input type='text' name='TeamID'>
				Last Name: <input type='text' name='LastName'>
				First Name: <input type='text' name='FirstName'>
				Position: <input type='text' name='Position'>
				Academic Level: <input type='text' name='Academic_level'>
				Contact: <input type='text' name='Contact'>
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
	$LastName = $_POST['LastName'];
	$FirstName = $_POST['FirstName'];
	$Position = $_POST['Position'];
	$Academic_level = $_POST['Academic_level'];
	$Contact = $_POST['Contact'];
	
	//echo $IncomeID.'<br>';
	
	$query = "INSERT INTO Athlete (TeamID, LastName, FirstName, Position, Academic_level, Contact) VALUES ('$TeamID', '$LastName', '$FirstName', '$Position', '$Academic_level', '$Contact')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: readathlete.php");
	
	
	
	
}



?>