<?php
session_start();
$unameError = $pwordError = "";
$server = "localhost";
$user = "ecm1417";
$passwd = "WebDev2021";
$db = "webdev";
$conn = mysqli_connect($server, $user, $passwd, $db);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["uname"])){
		$unameError = "Please enter your username";
	} else {
		$uname = test_input($_POST["uname"]);
	}
	if (empty($_POST["pword"])){
		$pwordErr = "Please enter your password";
	} else {
		$pword = test_input($_POST["pword"]);
	}
	$sql = "SELECT password FROM User WHERE username = '" . $uname . "'";
	if(($result = mysqli_query($conn, $sql))===false){
		die("Error executing".$sql);
	}
	if(mysqli_num_rows($result)!== 1){
		die("Username does not exist");
	}
	$user = mysqli_fetch_row($result);
	if(password_verify($pword,$user[0])){
		$correctLogin = true;
		$sql = "SELECT id, name FROM User WHERE username = '" . $uname . "'";
		if(($result = mysqli_query($conn, $sql))===false){
			die("Error executing".$sql);
		}
		$user = mysqli_fetch_row($result);
		$_SESSION["id"] = $user[0];
		$_SESSION["name"] = $user[1];
		setCookies();
	} else {
		$correctLogin = false;
	}
}
mysqli_free_result($result);
mysqli_close($conn);
if($correctLogin === true){
	header("Location: Homepage.php");
} else {
	header("Location: LoginPage.html");
}

function test_input($input){
	$input = htmlspecialchars(stripslashes(trim($input)));
	return $input;
}

function setCookies(){
		$cookieName = "weeks";
		$cookieValue = "1";
		$exp = 60 * 60 * 24 * 30;
		$path = "/";
		setcookie($cookieName, $cookieValue, time() + $exp, $path,"","",true);
		$cookieName = "distance";
		$cookieValue = "20";
		setcookie($cookieName, $cookieValue, time() + $exp, $path,"","",true);
}
?>