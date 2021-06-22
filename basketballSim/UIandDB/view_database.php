<!DOCTYPE html>
<html>
<body>

<b><br> Players (only some examples) </br> </b>
<?php
require_once('database.php');
$sql = "USE cpak4_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
$sql = "SELECT * FROM players";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  $i = 0;
  while($row = $result->fetch_assoc() and $i <= 4) {
    echo "<br> |player_id: ". $row["player_id"]. "| position: " . $row["position"]. "| name: ". $row["name"]. "| avg_pts: ". $row["avg_pts"].
	 "| avg_reb: ". $row["avg_reb"]. "| avg_ast: ". $row["avg_ast"]. "| avg_stl: ". $row["avg_stl"]. 
	 "| avg_blk: ". $row["avg_blk"] . "|<br>";
	 $i++;
  }	
} else {
  echo "0 results";
}
?>
<b><br> Teams </br> </b>
<?php
$sql = "SELECT * FROM teams WHERE conference = 'W'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  $i = 0;
  while($row = $result->fetch_assoc() and $i <= 4) {
    echo "<br> |team_init: ". $row["team_init"]. "| team_name: " . $row["team_name"]. "| seed_num: ". $row["seed_num"]. "| conference: ". $row["conference"].
	 "|<br>";
	 $i++;
  }
} else {
  echo "0 results";
}
?>
<b><br> Games </br> </b>
<?php
$sql = "SELECT * FROM games";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  $i = 0;
  while($row = $result->fetch_assoc() and $i <= 8) {
    echo "<br> |score_winner: ". $row["score_winner"]. "| score_loser: " . $row["score_loser"]. "| winner: ". $row["winner"]. "| loser: ". $row["loser"].
	 "| dates: " . $row["dates"] . "|<br>";
	 $i++;
  }
} else {
  echo "0 results";
}
?>
<b><br> Series </br> </b>
<?php
$sql = "SELECT * FROM series";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  $i = 0;
  while($row = $result->fetch_assoc() and $i <= 8) {
    echo "<br> |round_num: ". $row["round_num"]. "| conference: " . $row["conference"]. "| year_played: ". $row["year_played"]. 
	 "| ser_winner: " . $row["ser_winner"] . "| ser_loser: " . $row["ser_loser"]. "| winner_record: " . $row["winner_record"]. 
	 "| loser_record: " . $row["loser_record"]. "|<br>";
	 $i++;
  }
} else {
  echo "0 results";
}
?>
</body>
</html>