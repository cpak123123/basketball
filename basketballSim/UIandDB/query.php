<!DOCTYPE html>
<html>
<body>

<?php
require_once('database.php');
$sql = "USE proj3;";
if ($conn->query($sql) === TRUE) {
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$query = $_POST["query"];
echo $query;

$sql = $query;
$results = $conn->query($sql);
while($arr = mysqli_fetch_array($results))
{
  foreach($arr as $k => $v)
  {
    if(intval($k) != 0 || $k == '0') continue;
    echo "$k : $v <br>\n";
  }
  echo "<br>";
}

if ($results === TRUE) {
    echo "Querying Finished!";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<?php
$conn->close();
?>

</body>
</html>