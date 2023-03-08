<html>
	<head>
	
	<h1> Team Selection Page </h1>
	
	</head>

<form action="http://localhost:8888/FINAL%20PROJECT/createteam.php">
        <button>ADD NEW TEAM</button>
      </form>

</html>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM Team";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	TeamID: $row[TeamID]
	Type: $row[Type]
	Email: $row[Email]
	Established Date: $row[Established_date]
	
	</pre>

	
<form action='deleteteam.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='TeamID' value='$row[TeamID]'>
		<input type='submit' value='DELETE TEAM'>	
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