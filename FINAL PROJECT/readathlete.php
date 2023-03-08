<html>
	<head>
	
	<h1> Athlete List </h1>
	
	</head>

<form action="http://localhost:8888/FINAL%20PROJECT/createathletes.php">
        <button>ADD NEW ATHLETE</button>
      </form>
      
      <form action="http://localhost:8888/FINAL%20PROJECT/readscholarship.php">
        <button>VIEW ATHLETE SCHOLARSHIPS</button>
      </form>


</html>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM Athlete";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	AthleteID: $row[AthleteID]
	TeamID: $row[TeamID]
	LastName: $row[LastName]
	FirstName: $row[FirstName]
	Position: $row[Position]
	Academic_level: $row[Academic_level]
	Contact: $row[Contact]
	
	</pre>



	
<form action='deleteathlete.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='AthleteID' value='$row[AthleteID]'>
		<input type='submit' value='DELETE ATHLETE'>	
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