<?php 
session_start();
$date = $time = $duration = "";
$addToDB = true;
$server = "localhost";
$user = "ecm1417";
$passwd = "WebDev2021";
$db = "webdev";
$conn = mysqli_connect($server, $user, $passwd, $db);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["date"])){
		$addToDB = false;
	} else {
		$date = test_input($_POST["date"]);
	}
	if (empty($_POST["time"])){
		$addToDB = false;
	} else {
		$time = test_input($_POST["time"]);
	}
	if (empty($_POST["duration"])){
		$addToDB = false;
	} else {
		$duration = test_input($_POST["duration"]);
	}
	if (empty($_POST["xposition"])){
		$addToDB = false;
	} else {
		$x = test_input($_POST["xposition"]);
		$y = test_input($_POST["yposition"]);
	}
	if (isset($_SESSION["id"]) == false){
		$addToDB = false;
	} else {
		$userid = $_SESSION["id"];
	}
	if(addToDB == true){
		$sql = "INSERT INTO Visit (date, time, duration, userid, x, y) VALUES ('". $date ."', '". $time ."', '". $duration ."', '" . $userid . "', '" . $x . "', '" . $y . "')";
		if(mysqli_query($conn, $sql)===false){
			die("Error executing".$sql);
		}
	}
}
mysqli_free_result($result);
mysqli_close($conn);
header("Location: Overview.php");

function test_input($input){
	$input = htmlspecialchars(stripslashes(trim($input)));
	return $input;
}
?>