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
<li><a class = "menu" href = "Report.php">Report</a></li>
<li><a class = "menu" id = "currentmenu">Settings</a></li>
<li><a class = "menu" href = "logoutScript.php">Logout</a></li>
</ul>

<div class = "wrap">
 <img class = "watermark" src = "watermark.png">
 <div class = "content" align = "center">
 <form method = "POST" action = "changeSettings.php">
  <div class = "titlebar">
   <h2 class = "pagetitle"> Alert Settings </h2>
  </div>
   <div class = "reportcontainer">
	Here you may change the alert distance and the time space for which the contact tracing will be performed
	<div id = "largetoppadding">
	 <label> window </label>
	 <select name = "window">
	  <option value="1"> One week</option>
	  <option value="2"> Two weeks</option>
	  <option value="3"> Three weeks</option>
	  <option value="4"> Four weeks</option>
	 </select>
	 <br>
     distance <input type ="number" name = "distance" class = "mapinput reportinput">
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