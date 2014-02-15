<?php

//GMO Library - Gives all the functions needed to run the GMH

//////////VITALS////////////
function intDatabase() {
   include("souphouse.php");
   $cxn = mysqli_connect($dbhost, $dbuser, $dbpassword) or die("An error occured.");
   mysqli_select_db($cxn, $dbname) or die("An error occured.");
   return $cxn;
}
/////////PRIMARY//////////
function getCurrentUser() {
   if (isset($_COOKIE['gmousername'])) {
      return $_COOKIE['gmousername'];
   } else {
      return "";
   }
}
function checkLogin() {
   //checks if the user is logged in-if not, returns false.
   
   $cxn = intDatabase();

   if (isset($_COOKIE['gmousername'])==false) {
      return false;
   }
   if (isset($_COOKIE['gmopassword'])==false) {
      return false;
   }

   $query = "SELECT * FROM users WHERE userName = '" . mysqli_real_escape_string($cxn,$_COOKIE['gmousername']) . "'";

   $result = mysqli_query($cxn,$query) or die("An error occured.");

   if ($row = mysqli_fetch_assoc($result)) {
      if ($row['userPassword'] == $_COOKIE['gmopassword']) {
         return true;
      } else {
         return false; 
      }
   } else {
      return false;
   }
}

function getUserInfo($userID,$column) {
   $cxn = intDatabase();
   $query = "SELECT * FROM users WHERE userID='" . mysqli_real_escape_string($cxn,$userID) . "'";
   $result = mysqli_query($cxn,$query);
   if ($row = mysqli_fetch_assoc($result)) {
      return $row[$column];
   }
}

function forceNetread() {
   $browser =  $_SERVER['HTTP_USER_AGENT'];

   if ($browser != "netreaddll")
   {
      die("You are viewing this page with a external web browser.  Sorry, but this is not allowed.");
   }
}
/////////SECONDARY////////////

function getCurrentUserID() {
   $cxn = intDatabase();

   $query = "SELECT userID FROM users WHERE userName = '" . getCurrentUser() . "'";

   $result = mysqli_query($cxn,$query) or die("An error occured.");

   if ($row = mysqli_fetch_assoc($result)) {
      return $row['userID'];
   } else {
      return false;
   }
}

function forceLogin() {
   //if the user isn't logged in, its to the login page with you!
   if (checkLogin() == false) {
      header('Location: login.php?error=5');
      die("bigerror");
   }
}
?>