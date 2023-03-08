<html>
	<head>
	
	<h1> Team Equipment </h1>
	
	</head>

<form action="http://localhost:8888/FINAL%20PROJECT/createequipment.php">
        <button>ADD NEW EQUIPMENT </button>
      </form>

</html>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM Equipment";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	EquipmentID: $row[EquipmentID]
	TeamID: $row[TeamID]
	Type: $row[Type]
	Annual Cost: $row[Annual_cost]
	Year: $row[Year]
	
	</pre>



	
<form action='deleteequipment.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='EquipmentID' value='$row[EquipmentID]'>
		<input type='submit' value='DELETE EQUIPMENT'>	
	</form>
	
_END;

}

$conn->close();



?>

<html>





<form action="http://localhost:8888/FINAL%20PROJECT/employeehomepage.php">
        <button>Back to Homepage</button>
      </form>



</html>