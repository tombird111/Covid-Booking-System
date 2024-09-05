<?php 
session_start();
$fnameError = $snameError = $unameErr = $pwordErr = "";
$fname = $sname = $uname = $pword = "";
$addToDB = true;
$server = "localhost";
$user = "ecm1417";
$passwd = "WebDev2021";
$db = "webdev";
$conn = mysqli_connect($server, $user, $passwd, $db);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["fname"])){
		$addToDB = false;
		$fnameError = "First name is required";
	} else {
		$fname = test_input($_POST["fname"]);
	}
	$lastName = test_input($_POST["sname"]);
	if (empty($_POST["uname"])){
		$addToDB = false;
		$unameError = "A username is required";
	} else {
		$uname = test_input($_POST["uname"]);
	}
	if (empty($_POST["pword"])){
		$addToDB = false;
		$pwordErr = "A password is required";
	} else {
		$pword = test_input($_POST["pword"]);
		$pwordlength = strlen($pword);
		if($pwordlength < 8){
			$addToDB = false;
		}
	}
	if(addToDB == true){
		$name = $fname . " " . $sname;
		$pword = encrypt_password($pword);
		$sql = "INSERT INTO User (username, password, name) VALUES ('". $uname ."', '". $pword ."', '". $name ."')";
		if(mysqli_query($conn, $sql)===false){
			die("Error executing".$sql);
		}
		$login = true;
		$lastid = $conn->insert_id;
		$_SESSION["id"] = $lastid;
		$_SESSION["name"] = $uname;
		setCookies();
	}
}
mysqli_free_result($result);
mysqli_close($conn);
if($login === true){
	header("Location: Homepage.php");
} else {
	header("Location: Registration.html");
}

function encrypt_password($basepword){
	$options = [
		'cost' => 12,
	];
	return password_hash($basepword, PASSWORD_BCRYPT, $options);
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