
<?php

$username = "cpak4";
$pswd = "UkJk8Q3y";
$database = "cpak4_1";

$username1 = "root";
$pswd1 = "Chrisquel925";
$database1 = "user";

$conn = new mysqli("localhost", $username1, $pswd1, $database1);
if ($conn->connect_error) {
	die("Connection failed: " .$conn->connect_error);
}
?>
