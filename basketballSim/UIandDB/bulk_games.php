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
	(score_winner, score_loser, winner, loser, dates);";


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