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
<li><a class = "menu" href = "Add Visit.php">Add Visit</a></li>
<li><a class = "menu" id = "currentmenu">Report</a></li>
<li><a class = "menu" href = "Settings.php">Settings</a></li>
<li><a class = "menu" href = "logoutScript.php">Logout</a></li>
</ul>

<div class = "wrap">
 <img class = "watermark" src = "watermark.png">
 <div class = "content" align = "center">
 <form method = "POST" action = "reportInfection.php">
  <div class = "titlebar">
   <h2 class = "pagetitle"> Report an Infection</h2>
  </div>
   <div class = "reportcontainer">
	 Please report the date and time you were tested positive for COVID-19.
	 <div id = "largetoppadding">
	 <label> Date: </label><br>
     <input type ="date" name = "date" class = "mapinput reportinput"><br>
	 <label> Time: </label><br>
     <input type ="time" name = "time" class = "mapinput reportinput">
 	</div>
   </div>
   <div class = "reportbuttoncontainer">
    <input type ="submit" name = "report" value = "Report" class = "inputbutton reportbutton left">
    <input type ="reset" name = "cancel" value = "Cancel" class = "inputbutton reportbutton right">
   </div>
  </form>
 </div>
</div>

</body>
</html>