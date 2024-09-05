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
$sql= "SELECT id, date, time, duration, x, y FROM Visit WHERE userid = " . $_SESSION["id"];
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row["date"] . "</td>";
  echo "<td>" . $row["time"] . "</td>";
  echo "<td>" . $row["duration"] . "</td>";
  echo "<td>" . $row["x"] . "</td>";
  echo "<td>" . $row["y"] . "</td>";
  echo "<td> <img src = 'cross.png' height = 50 width = 50 onclick = 'deleteRow(" . $row["id"] . ")'> </td>";
  echo "</tr>";
}
mysqli_close($conn);
?>