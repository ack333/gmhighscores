<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>Gamemaker Highscores</title>
<link rel="icon" href="GMHicon.gif" type="image/x-icon"> 
<link rel="shortcut icon" href="GMHicon.gif" type="image/x-icon"> 
<style type="text/css">
body {
   font-family:Arial;
   background-color:#000;
   color:#FFF;
}
#maintable {
   width:800px;
   margin:0px auto 0px auto;
}
a:link {
   color:#777;
}
a:visited {
   color:#777;
}
a:hover {
   color:#999;
}
a:active {
   color:#444;
}
.spacer {
   height:10px;
}
.spacerb {
   height:16px;
}
#navbar {
   height:150px;
}
#contenttd {
   width:1000px;
   padding:10px;
}
#footertd {
   width:1000px;
   height:50px;
   border:#FFF solid 1px;
}
form table {
   /*border-left:#FFF solid 1px;
   border-right:#FFF solid 1px; ERASED - TESTING NO BORDERS*/
   padding:10px;
   margin:10px auto 10px auto;
}
.errorbox {
   width:800px;
   border:#F00 solid 1px;
   background-color:#600;
   padding:20px;
}
.noticebox {
   width:800px;
   border:#FFF solid 1px;
   background-color:#000;
   padding:20px;
}
#userbar {
   text-align:right;
}

table #account,table #games {
   margin:10px auto 10px auto;
   /*border-left:1px #FFF solid;
   border-right:1px #FFF solid; ERASED - TESTING NO BORDERS*/
   padding:10px;
}

.gametd { /*games.php*/
   padding: 5px;
}

#frontpageimg { /*index.php*/
   margin:0px 200px 0px 200px;
}

table .highscore { /*highscores.php*/
   margin:10px auto 10px auto;
   border-collapse:collapse;
}

tr .highscore { /*highscores.php*/
   border-bottom:1px solid #FFF;
}

.placetd { /*highscores.php*/
   min-width:50px;
   font-size:x-large;
}

.nametd { /*highscores.php*/
   min-width:100px;
}

.scoretd { /*highscores.php*/
   min-width:50px;
}

#clockworkad {
   width:100%;
   border-bottom:1px solid #666;
   margin-bottom:10px;
}
</style>

<script type="text/javascript">
function showHome() {
   document.getElementById("homediv").style.display = "block";
}
function showSearch() {
   document.getElementById("searchdiv").style.display = "block";
}
function showLogin() {
   document.getElementById("logindiv").style.display = "block";
}
function showAccount() {
   document.getElementById("accountdiv").style.display = "block";
}
function showGame() {
   document.getElementById("gamediv").style.display = "block";
}
function showLogout() {
   document.getElementById("logoutdiv").style.display = "block";
}
function showHelp() {
   document.getElementById("helpdiv").style.display = "block";
}
function showNone() {
   document.getElementById("homediv").style.display = "none";
   document.getElementById("searchdiv").style.display = "none";
   document.getElementById("logindiv").style.display = "none";
   document.getElementById("accountdiv").style.display = "none";
   document.getElementById("logoutdiv").style.display = "none";
   document.getElementById("helpdiv").style.display = "none";
}
</script>
<meta name="microid" content="mailto+http:sha1:25509ef7ef59dca05583713b1952371732de8178" />
</head>



<body onLoad='showNone()'>

<div id='navbar'>
<img src='gmhlogobeta.gif' border = '0' alt='gmhlogo'>&nbsp;<a href='index.php'><img src='homebutton.gif' border = '0' onMouseOver='showHome()' onMouseOut='showNone()' alt='Home'></a>&nbsp;<a href='services.php'><img src='pagebutton.gif' border = '0' onMouseOver='showSearch()' onMouseOut='showNone()' alt='Services'></a>&nbsp;<?php

if (checkLogin() == true) {
   echo "<a href='account.php'><img src='accountbutton.gif' border = '0' onMouseOver='showAccount()' onMouseOut='showNone()' alt='Account'></a>&nbsp;";
   echo "<a href='logout_action.php'><img src='logoutbutton.gif' border = '0' onMouseOver='showLogout()' onMouseOut='showNone()' alt='Logout'></a>";
} else {
   echo "<a href='login.php'><img src='signbutton.gif' border = '0' onMouseOver='showLogin()' onMouseOut='showNone()' alt='Login'></a>";
}

?>&nbsp;<a href='http://gmhighscores.mojohelpdesk.com/login/create_request'><img src='helpbutton.gif' border = '0' onMouseOver='showHelp()' onMouseOut='showNone()' alt='Help'></a>

<div id='homediv'>Home</div>
<div id='searchdiv'>Examples</div>
<div id='logindiv'>Login/Create Account</div>
<div id='accountdiv'>Manage Account</div>
<div id='logoutdiv'>Logout</div>
<div id='helpdiv'>Help</div>
</div>

<table id='maintable'>
<?php

if (isset($_GET['error'])) {
   $error = $_GET['error'];
   echo "<tr><td class='errorbox'>";
   if ($error == 1) {
      echo "Invalid username or password.";
   } else if ($error == 2) {
      echo "The two passwords you typed do not match.";
   } else if ($error == 3) {
      echo "That account name or email is already in use.";
   } else if ($error == 4) {
      echo "The information you supplied is invalid.";
   } else if ($error == 5) {
      echo "You must log in to do that!";
   } else if ($error == 5) {
      echo "That name is already in use.";
   } else {
      echo "An unknown error occured. Please <a href='http://gmhighscores.mojohelpdesk.com/login/create_request'>report it</a>.";
   }
   echo "</td></tr><tr class='spacerow'><td></td></tr>";
} else if (isset($_GET['notice'])) {
      $notice = $_GET['notice'];
   echo "<tr><td class='noticebox'>";
   if ($notice == 1) {
      echo "You are now logged in.";
   } else if ($notice == 2) {
      echo "You are now logged out.";
   } else if ($notice == 3) {
      echo "Your game has been registered.";
   } else if ($notice == 4) {
      echo "Your password has been changed. Please login again.";
   } else {
      echo "An unknown error occured. Please <a href='http://gmhighscores.mojohelpdesk.com/login/create_request'>report it</a>.";
   }
   echo "</td></tr><tr class='spacerow'><td></td></tr>";
}

?>

<tr><td>
