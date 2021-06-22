<!DOCTYPE html>
<html>
<body style="background-color:#CCCCFF">

<?php
$search = $_POST["search"];
$option = $_POST["searches"];
require_once('database.php');
$sql = "USE proj3;";
if ($conn->query($sql) === TRUE) {
} else {
   echo "Error using  database: " . $conn->error;
}
	if($option == "Players"){
		$sql = "SELECT * FROM players WHERE player_id = '$search';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<br> |player_id: ". $row["player_id"]. "| position: " . $row["position"]. "| name: ". $row["name"]. "| avg_pts: ". $row["avg_pts"].
			"| avg_reb: ". $row["avg_reb"]. "| avg_ast: ". $row["avg_ast"]. "| avg_stl: ". $row["avg_stl"]. 
			"| avg_blk: ". $row["avg_blk"] . "|<br>";
  }
	} 
		else {
			echo "0 results";
}
	}
	if($option == "Series"){
		$keys = explode(" ",$search);
		$sql = "SELECT * FROM series WHERE round_num = $keys[0] AND conference = '$keys[1]' AND year_played = $keys[2] AND ser_winner = '$keys[3]' AND ser_loser = '$keys[4]';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<br> |score_winner: ". $row["score_winner"]. "| score_loser: " . $row["score_loser"]. "| winner: ". $row["winner"]. "| loser: ". $row["loser"].
				"| dates: " . $row["dates"] . "|<br>";
	}
	} 
		else {
			echo "0 results";
		
	}
	}
	if($option == "Game"){
			$keys = explode(" ",$search);
		$sql = "SELECT * FROM games WHERE winner = '$keys[0]' AND loser = '$keys[1]' AND dates = '$keys[2]';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo "<br> |score_winner: ". $row["score_winner"]. "| score_loser: " . $row["score_loser"]. "| winner: ". $row["winner"]. "| loser: ". $row["loser"].
				"| dates: " . $row["dates"] . "|<br>";
	} 
		}
		else {
			echo "0 results";
		
	}
	}
		
	
?>
<form action="search.html">
	<button type="submit">Go Back </button>
</form>
</body>

</html>
