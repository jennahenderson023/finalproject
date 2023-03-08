<html>
	<head>
	
	<h1> Team Equipment </h1>
	
	</head>

<form action="http://localhost:8888/FINAL%20PROJECT/createscholarship.php">
        <button>ADD NEW SCHOLARSHIP </button>
      </form>

</html>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM Scholarship";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	ScholarshipID: $row[ScholarshipID]
	AthleteID: $row[AthleteID]
	Amount: $row[Amount]
	Date: $row[Date]
	Donor: $row[Donor]
	Type: $row[Type]
	
	</pre>



	
<form action='deletescholarship.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='ScholarshipID' value='$row[ScholarshipID]'>
		<input type='submit' value='DELETE SCHOLARSHIP'>	
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