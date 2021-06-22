<!DOCTYPE html>
<html>
<body>

<b><br> Players </br> </b>
<?php
require_once('database.php');
$sql = "USE proj3;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
$sql = "SELECT * FROM players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<br> |player_id: ". $row["player_id"]. "| position: " . $row["position"]. "| name: ". $row["name"]. "| avg_pts: ". $row["avg_pts"].
	 "| avg_reb: ". $row["avg_reb"]. "| avg_ast: ". $row["avg_ast"]. "| avg_stl: ". $row["avg_stl"]. 
	 "| avg_blk: ". $row["avg_blk"] . "|<br>";
  }	
} else {
  echo "0 results";
}
?>
<form action="welcome.html">
	<button type="submit">Go Back </button>
</form>
</body>
</html>
