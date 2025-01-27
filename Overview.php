<?php session_start() ?>
<html>
<head>
<link rel="stylesheet" href="GuidedStyle.css">
</head>
<body onload = "listVisits()">

<div class = "pageheader" align = "center">
Covid-19 Contact Tracing
</div>
<ul class = "menulist">
<li><a class = "menu" href = "Homepage.php">Home</a></li>
<li><a class = "menu" id = "currentmenu">Overview</a></li>
<li><a class = "menu" href = "Add Visit.php">Add Visit</a></li>
<li><a class = "menu" href = "Report.php">Report</a></li>
<li><a class = "menu" href = "Settings.php">Settings</a></li>
<li><a class = "menu" href = "logoutScript.php">Logout</a></li>
</ul>

<div class = "wrap">
 <img class = "watermark" src = "watermark.png">
 <div class = "content">
  <table id = "visittable">
   <tr>
    <th>Date</th>
	<th>Time</th>
	<th>Duration</th>
	<th>X</th>
	<th>Y</th>
	<th></th>
   </tr>
   <tr id = "placeholder"> </tr>
  </table>
 </div>
</div>
<script>
function listVisits() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("placeholder").outerHTML = this.responseText;
		}
    };
    xmlhttp.open("GET","sqlVisitRetrieval.php",true);
    xmlhttp.send();
}

function deleteRow(number){
	if (number == "") {
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert("Row successfully deleted");
		}
	};
    xmlhttp.open("GET","sqlDeleteVisit.php?q="+number,true);
    xmlhttp.send();
	}
}
</script>
</body>
</html>