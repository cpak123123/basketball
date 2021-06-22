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
$player_id = $_POST['player_id'];
$column = $_POST['players'];
$new_value = $_POST['new_value'];




$sql = "UPDATE players SET $column = $new_value WHERE player_id = '$player_id';";


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