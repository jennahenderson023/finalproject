<html>
	<head>
	
	<h1> Team Income Sheets </h1>
	
	</head>

<form action="http://localhost:8888/FINAL%20PROJECT/createincomesheet.php">
        <button>ADD NEW INCOME SHEET</button>
      </form>

</html>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM Income";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	IncomeID: $row[IncomeID]
	TeamID: $row[TeamID]
	Type: $row[Type]
	Amount: $row[Amount]
	Year: $row[Year]
	
	</pre>



	
<form action='deleteincomesheet.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='IncomeID' value='$row[IncomeID]'>
		<input type='submit' value='DELETE SHEET'>	
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