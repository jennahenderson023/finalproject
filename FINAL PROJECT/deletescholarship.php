<?php

//import credentials for db
require_once  'login.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);



if(isset($_POST['delete']))
{
	$ScholarshipID = $_POST['ScholarshipID'];

	$query = "DELETE FROM Scholarship WHERE ScholarshipID='$ScholarshipID' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: readscholarship.php");
	
}


?>


