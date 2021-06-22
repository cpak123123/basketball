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
$player_id = $_POST['player_id'];
$position = $_POST['position'];
$name = $_POST['name'];
$avg_pts = $_POST['avg_pts'];
$avg_reb = $_POST['avg_reb'];
$avg_ast = $_POST['avg_ast'];
$avg_stl = $_POST['avg_stl'];
$avg_blk = $_POST['avg_blk'];


$sql = "INSERT INTO players values ('$player_id', '$position', '$name', $avg_pts, $avg_reb, $avg_ast, $avg_stl, $avg_blk);";


$result = $conn->query($sql);

if ($result === TRUE) {
	header("refresh:3; url=welcome.html");
    echo "New record created successfully: ";
	echo $player_id . " " . $position . " ". $name . " ".  $avg_pts ." ".  $avg_reb ." ".  $avg_ast ." ". $avg_stl ." ". $avg_blk. " ";
	
	echo "Redirecting you to home page";
	
} else {
	header("refresh:3; url=welcome.html");
    echo "Error: " . $sql . "<br>" . $conn->error . " ";
	echo " redirecting you to home page";
}

?>

<?php
$conn->close();

?>

</body>
</html>