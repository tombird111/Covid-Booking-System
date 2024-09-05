<?php 
session_start();
$addToDB = true;
$dateError = $timeError = "";
$server = "localhost";
$user = "ecm1417";
$passwd = "WebDev2021";
$db = "webdev";
$conn = mysqli_connect($server, $user, $passwd, $db);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["date"])){
		$addToDB = false;
		$dateError = "Please enter a date";
	} else {
		$date = test_input($_POST["date"]);
	}
	if (empty($_POST["time"])){
		$addToDB = false;
		$timeError = "Please enter a time";
	} else {
		$time = test_input($_POST["time"]);
	}
	$userid = $_SESSION["id"];
	if(addToDB == true){
		$sql = "INSERT INTO Infection (date, time, userid) VALUES ('". $date ."', '". $time ."', '". $userid ."')";
		if(mysqli_query($conn, $sql)===false){
			die("Error executing".$sql);
		}
	}
}
mysqli_free_result($result);
mysqli_close($conn);
header("Location: Homepage.php");

function test_input($input){
	$input = htmlspecialchars(stripslashes(trim($input)));
	return $input;
}
?>