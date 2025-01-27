<?php session_start() ?>
<html>
<head>
<link rel="stylesheet" href="GuidedStyle.css">
</head>
<body>

<div class = "pageheader" align = "center">
Covid-19 Contact Tracing
</div>
<ul class = "menulist">
<li><a class = "menu" href = "Homepage.php">Home</a></li>
<li><a class = "menu" href = "Overview.php">Overview</a></li>
<li><a class = "menu" id = "currentmenu">Add Visit</a></li>
<li><a class = "menu" href = "Report.php">Report</a></li>
<li><a class = "menu" href = "Settings.php">Settings</a></li>
<li><a class = "menu" href = "logoutScript.php">Logout</a></li>
</ul>

<div class = "wrap">
 <img class = "watermark" src = "watermark.png">
 <div class = "content" align = "center">
  <div class = "titlebar">
   <h2 class = "pagetitle"> Add a new Visit </h2>
  </div>
  <form class = "mapcolumn left" align = "left" method = "POST" action = "AddVisitFunction.php">
	 <label> Date: </label><br>
     <input type ="date" name = "date" class = "mapinput"><br>
	 <label> Time: </label><br>
     <input type ="time" name = "time" class = "mapinput"><br>
	 <label> Duration: </label><br>
     <input type ="number" name = "duration" class = "mapinput"><br>
	 <input type ="hidden" name = "xposition" id = "xposition">
	 <input type ="hidden" name = "yposition" id = "yposition">
    <div class = "mapbuttoncontainer">
	 <input type ="submit" name = "add" value = "Add" class = "inputbutton mapinput"><br>
	 <input type ="reset" name = "cancel" value = "Cancel" class = "inputbutton mapinput">
	</div>
  </form>
  <div class = "mapcolumn right">
    <img class = "map" src = "exeter.jpg" onclick = "operateMap(this)">
	<img id = "marker" src = "marker_black.png" width = "50" height = "50" style = "left: 67.5%; top: 40%; position: absolute;">
  </div>
 </div>
</div>
<script>
function operateMap(mapIdentifier){
	boundaries = mapIdentifier.getBoundingClientRect();
	var xBase = boundaries.left;
	var yBase = boundaries.top;
	var offX = event.offsetX;
	var offY = event.offsetY;
	var xCoord = xBase + offX - 180;
	var yCoord = yBase + offY - 160;
	moveMarker(xCoord, yCoord, offX, offY);
}

function moveMarker(xValue, yValue, offsetX, offsetY){
	document.getElementById("marker").style.left = xValue;
	document.getElementById("marker").style.top = yValue;
	document.getElementById("marker").src = "marker_red.png";
	document.getElementById("xposition").value = offsetX;
	document.getElementById("yposition").value = offsetY;
}
</script>
</body>
</html>