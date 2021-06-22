<!DOCTYPE html>
<html>
<body>

<?php
require_once('database.php');
$sql = "USE cpak4_1;";
if ($conn->query($sql) === TRUE) {
} else {
   echo "Error using  database: " . $conn->error;
}

$round_num = $_POST['round_num'];
$conference = $_POST['conference'];
$year_played = $_POST['year_played'];
$ser_winner = $_POST['ser_winner'];
$ser_loser = $_POST['ser_loser'];



$sql = "DELETE FROM series WHERE (round_num = $round_num) AND (conference = $conference) AND
	(year_played = $year_played) AND (ser_winner = $ser_winner) AND (ser_loser = $ser_loser);";


$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Record Deleted";
	
} else {
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
$round_num = $_POST['round_num'];
$conference = $_POST['conference'];
$year_played = $_POST['year_played'];
$ser_winner = $_POST['ser_winner'];
$ser_loser = $_POST['ser_loser'];
$winner_record = $_POST['winner_record'];
$loser_record = $_POST['loser_record'];



$sql = "INSERT INTO series values ($round_num, '$conference', year_played, '$ser_winner', '$ser_loser', $winner_record, $loser_record);";


$result = $conn->query($sql);

if ($result === TRUE) {
	header("refresh:3; url=welcome.html");
    echo "New record created successfully";
	
} else {	
	header("refresh:3; url=add_games.html")
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo " redirecting you to home page";
}

?>

<?php
$conn->close();
?>

</body>
</html>
}

?>

<?php
$conn->close();
?>

</body>
</html>