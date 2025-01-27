<?php session_start() ?>
<html>
<head onload = "placeInfections()">
<link rel="stylesheet" href="GuidedStyle.css">
</head>
<body>

<div class = "pageheader" align = "center">
Covid-19 Contact Tracing
</div>
<ul class = "menulist">
 <li><a class = "menu" id = "currentmenu">Home</a></li>
 <li><a class = "menu" href = "Overview.php">Overview</a></li>
 <li><a class = "menu" href = "Add Visit.php">Add Visit</a></li>
 <li><a class = "menu" href = "Report.php">Report</a></li>
 <li><a class = "menu" href = "Settings.php">Settings</a></li>
 <li><a class = "menu" href = "logoutScript.php">Logout</a></li>
</ul>

<div class = "wrap">
 <img class = "watermark" src = "watermark.png">
 <div class = "content" align = "center">
  <div class = "titlebar">
   <h2 class = "pagetitle"> Status </h2>
  </div>
  <div class = "mapcolumn left" align = "left">
	Hi <?php echo $_SESSION["name"]; ?>, you might have had a connection to an infected person at the location shown in red.
	Click on the marker to see details about the infection.
	<div id = "test"> </div>
  </div>
  <div class = "mapcolumn right">
    <img class = "map" src = "exeter.jpg" id = "map">
	</img>
  </div>
 </div>
</div>
<script>
function placeInfections() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("map").innerHTML = this.responseText;
		}
    };
    xmlhttp.open("GET","sqlInfectionRetrieval.php",true);
    xmlhttp.send();
}
</script>
</body>
</html>