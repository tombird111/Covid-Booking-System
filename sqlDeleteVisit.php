<?php
session_start();
$q = intval($_GET["q"]);
$addToDB = true;
$server = "localhost";
$user = "ecm1417";
$passwd = "WebDev2021";
$db = "webdev";
$conn = mysqli_connect($server, $user, $passwd, $db);
$query = intval($_GET["q"]);
if (!$conn) {
  die("Could not connect: ".mysqli_error($conn));
}
$sql= "DELETE FROM Visit WHERE id = '" . $query . "'";
if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>