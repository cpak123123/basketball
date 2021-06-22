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

$player_id = $_POST['player_id'];




$sql = "DELETE FROM games WHERE player_id = $player_id;";


$result = $conn->query($sql);

if ($result === TRUE) {
    echo "Record Deleted";
	header("refresh:3; url=welcome.html")
	
} else {
	header("refresh:3; url=welcome.html");
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo " redirecting you to home page";
}

?>

<?php
$conn->close();
?>

</body>
</html>