<?php

//import credentials for db
require_once  'login.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);



if(isset($_POST['delete']))
{
	$EquipmentID = $_POST['EquipmentID'];

	$query = "DELETE FROM Equipment WHERE EquipmentID='$EquipmentID' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: readequipment.php");
	
}


?>


