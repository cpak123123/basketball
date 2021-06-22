<!DOCTYPE html>
<html>
<body>

<?php
$new_user= $_POST["new_uname"];
$new_pswd= $_POST["new_psw"];
require_once('user_database.php');
$sql = "INSERT INTO users values ('$new_user', '$new_pswd');";
$result = $conn->query($sql);

if ($result === TRUE) {
    #echo "New record created successfully";
	
} else {
	header("refresh:3; url=create_accnt.html");
	echo "Account user already exists, redirecting to Create account page";
	exit();
}	
if(strlen($new_user) < 5){
	header("refresh:3; url=create_accnt.html");
	echo '<i style="color:red;font-size:21px;font-family:calibri ;">
      Your username is too short. Redirecting to Create account page </i> ';
	exit();
	}
if(strlen($new_pswd) < 6){
	header("refresh:3; url=create_accnt.html");
	echo '<i style="color:red;font-size:21px;font-family:calibri ;">
      Your password is too short. Redirecting to Create account page </i> ';
	exit();
	}
$symbols = array('!','@','#','$','%','^','&','*','(',')','_','+', ',','.',';');
foreach ($symbols as $non){
	if (strpos($new_pswd, $non)){
			header("refresh:3; url=create_accnt.html");
			echo '<i style="color:red;font-size:21px;font-family:calibri ;">
			Your password contains a symbol. Redirecting to Create account page </i> ';
		exit();	
	
		}
	}
header("refresh:3; url=login.html");
echo '<i style="color:blue;font-size:21px;font-family:calibri ;">
     Account created successfully. Redirecting to Login page </i> ';
require_once('user_database.php');
$sql = "USE user;";
if ($conn->query($sql) === TRUE) {
} else {
   #echo "Error using  database: " . $conn->error;
}

?>
<?php
$conn->close();
?>

</body>
</html>
