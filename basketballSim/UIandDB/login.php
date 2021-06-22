<!DOCTYPE html>
<html>
<body>

<?php
$user_log= $_POST['uname'];
$pswd_log= $_POST['psw'];
require_once('user_database.php');
$sql = "SELECT * FROM users WHERE username = '$user_log' AND password = '$pswd_log';";
$result = $conn->query($sql);
$key = "";
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		$key = $row["username"] . " " . $row["password"];
	}
}

else{
	header("refresh:3; url=login.html");
	echo "No such password and/or username. Returning to login screen";
}
if ($key == ($user_log . " " . $pswd_log)){
	header("refresh:3; url=welcome.html");
	echo "Login Successful. Going to home page.";
}

?>

<?php
$conn->close();
?>

</body>
</html>
