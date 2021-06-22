<!DOCTYPE html>
<html>
<body>

<b><br> Teams </br> </b>
<?php
require_once('database.php');
$sql = "USE cpak4_1;";
$result = $conn->query($sql);
$sql = "SELECT * FROM teams;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    echo "<br> |team_init: ". $row["team_init"]. "| team_name: " . $row["team_name"]. "| seed_num: ". $row["seed_num"]. "| conference: ". $row["conference"].
	 "|<br>";
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