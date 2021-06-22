<!DOCTYPE html>
<html>
<body>

<?php
require_once('database.php');
$sql = "USE proj3;";
if ($conn->query($sql) === TRUE) {
} else {
   	header("refresh:3; url=add_games.html");
   echo "Error using  database: " . $conn->error;
}
// Query:
$score_winner = $_POST['score_winner'];
$score_loser = $_POST['score_loser'];
$winner = $_POST['winner'];
$loser = $_POST['loser'];
$dates = $_POST['dates'];



$sql = "INSERT INTO games values ($score_winner, $score_loser, '$winner', '$loser', '$dates');";


$result = $conn->query($sql);

if ($result === TRUE) {
	header("refresh:3; url=welcome.html");
    echo "New record created successfully: "
	
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