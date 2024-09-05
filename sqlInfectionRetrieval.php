<?php
session_start();
$q = intval($_GET["q"]);
$addToDB = true;
$server = "localhost";
$user = "ecm1417";
$passwd = "WebDev2021";
$db = "webdev";
$conn = mysqli_connect($server, $user, $passwd, $db);
if (!$conn) {
  die("Could not connect: ".mysqli_error($conn));
}
$days = $_COOKIE["window"] * 7;
$distance = $_COOKIE["distance"];
$userid = $_SESSION["id"];
$sql= "SELECT User.id, Infection.date FROM
User INNER JOIN Infection ON User.id = Infection.userid
INNER JOIN Visit ON User.id = Visit.userid
WHERE Visit.date BETWEEN DATE_SUB(CURDATE(), INTERVAL " . $days . " DAY) AND CURDATE()
AND EXISTS
(
SELECT * FROM Visit V
WHERE V.userid = " . $userid . "
AND SQRT (POWER(V.y - Visit.x, 2) + POWER(V.y - Visit.x, 2)) < " . $distance . "
AND (Visit.date BETWEEN V.date AND DATE_ADD(V.date, INTERVAL V.duration MINUTE)
OR (V.date BETWEEN Visit.date AND DATE_ADD(Visit.date, INTERVAL Visit.duration MINUTE)))
)";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
  echo "<img src = 'marker_red.png' height = 50 width = 50 style = 'position: absolute; top:" . $row["y"] . "; left: " . $row["x"] . " ;' onclick = 'displayInfo(" . $row["id"] . ")'>";
}
mysqli_close($conn);
?>