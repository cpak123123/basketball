<!DOCTYPE html>
<html>
<body>

<b><br>Series </br> </b>
<?php
require_once('database.php');
$sql = "USE cpak4_1;";
if ($conn->query($sql) === TRUE) {
} else {
   echo "Error using  database: " . $conn->error;
}
$sql = "SELECT * FROM series";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<br> |round_num: ". $row["round_num"]. "| conference: " . $row["conference"]. "| year_played: ". $row["year_played"]. 
	 "| ser_winner: " . $row["ser_winner"] . "| ser_loser: " . $row["ser_loser"]. "| winner_record: " . $row["winner_record"]. 
	 "| loser_record: " . $row["loser_record"]. "|<br>";

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