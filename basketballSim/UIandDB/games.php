<!DOCTYPE html>
<html>
<body>

<b><br>Games </br> </b>
<?php
require_once('database.php');
$sql = "USE cpak4_1;";
if ($conn->query($sql) === TRUE) {
} else {
   echo "Error using  database: " . $conn->error;
}
$sql = "SELECT * FROM games";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<br> |score_winner: ". $row["score_winner"]. "| score_loser: " . $row["score_loser"]. "| winner: ". $row["winner"]. "| loser: ". $row["loser"].
	 "| dates: " . $row["dates"] . "|<br>";
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