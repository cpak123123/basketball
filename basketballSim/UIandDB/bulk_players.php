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
$file = $_POST['myfile'];



$sql = "LOAD DATA LOCAL INFILE '$file' INTO TABLE games FIELDS TERMINATED By ',' LINES TERMINATED BY '\n' IGNORE 1 ROWS 
	('$player_id', '$position', '$name', $avg_pts, $avg_reb, $avg_ast, $avg_stl, $avg_blk);";


$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

<?php
$conn->close();
?>

</body>
</html>