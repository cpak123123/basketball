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
// Query:
$round_num = $_POST['round_num'];
$conference = $_POST['conference'];
$year_played = $_POST['year_played'];
$ser_winner = $_POST['ser_winner'];
$ser_loser = $_POST['ser_loser'];
$series = $_POST['series'];
$new_value = $_POST['new_value'];




$sql = "UPDATE series SET $series = $new_value WHERE round_num = $round_num AND conference = '$conference'
	year_played = $year_played AND ser_winner = '$ser_winner AND ser_loser = '$ser_loser;";


$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Record updated successfully";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<?php
$conn->close();
?>

</body>
</html> 