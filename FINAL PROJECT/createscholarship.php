<html>
	<head>
	
	<h1> Add New Scholarship</h1>
	
	</head>
	
	<body>
		<form method='post' action='createscholarship.php'>
			<pre>
				AthleteID: <input type='text' name='AthleteID'>
				Amount: <input type='text' name='Amount'>
				Date: <input type='text' name='Date'>
				Donor: <input type='text' name='Donor'>
				Type: <input type='text' name='Type'>
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
if(isset($_POST['AthleteID'])) 
{
	//Get data from POST object
	$AthleteID = $_POST['AthleteID'];
	$Amount = $_POST['Amount'];
	$Date = $_POST['Date'];
	$Donor = $_POST['Donor'];
	$Type = $_POST['Type'];
	
	//echo $ScholarshipID.'<br>';
	
	$query = "INSERT INTO Scholarship (AthleteID, Amount, Date, Donor, Type) VALUES ('$AthleteID', '$Amount', '$Date', '$Donor', '$Type')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: readscholarship.php");
	
	
	
	
}



?>