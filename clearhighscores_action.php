<?php
//clean


include_once("gmolibrary.php");

$cxn = intDatabase();

$query = "SELECT * FROM games WHERE gameID='" . $_GET['gameid'] . "'";
$result = mysqli_query($cxn,$query);

if ($row = mysqli_fetch_assoc($result)) {
   $gameuser = $row['gameUser'];
} else {
   header("Location: index.php?error=0");
   die();
}

$currentuserid = getCurrentUserID();
if ($currentuserid == false) {
   header("Location: login.php?error=5");
   die();
}
if ($currentuserid != $gameuser) {
   header("Location: index.php?error=0");
   die();
}

$query = "SELECT * FROM highscores WHERE hsGame='" . mysqli_real_escape_string($cxn,$_GET['gameid']) . "'";
$result = mysqli_query($cxn,$query);

if ($row = mysqli_fetch_assoc($result)) {
   $query = "DELETE FROM highscores WHERE hsGame='" . mysqli_real_escape_string($cxn,$_GET['gameid']) . "'";
   $result = mysqli_query($cxn,$query);
} else {
   header("Location: account.php");
   die();
}
header("Location: account.php");
?>