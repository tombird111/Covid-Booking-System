<?php
session_start();
$changeCookies = true;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if (empty($_POST["window"])){
		$changeCookies = false;
	} else {
		$weeks = $_POST["window"];
	}
	if (empty($_POST["distance"])){
		$changeCookies = false;
	} else {
		$distance = $_POST["distance"];
	}
	if($changeCookies === true){
		$cookieName = "weeks";
		$exp = 60 * 60 * 24 * 30;
		$path = "/";
		setcookie($cookieName, $weeks, time() + $exp, $path,"","",true);
		$cookieName = "distance";
		setcookie($cookieName, $distance, time() + $exp, $path,"","",true);
	}
}
header("Location: Homepage.php");
?>