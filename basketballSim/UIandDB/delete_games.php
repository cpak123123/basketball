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
$winner = $_POST['winner'];
$loser = $_POST['loser'];
$dates = $_POST['dates'];




$sql = "DELETE FROM games WHERE (winner = $winner) AND (loser = $loser) AND (dates = $dates);";


$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Record Deleted";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<?php
$conn->close();
?>

</body>
</html>