<?php
include_once("gmolibrary.php");

if (!isset($_GET['gameid'])) {
   die('0');
}
if (!isset($_GET['place'])) {
   die('0');
}

$cxn = intDatabase();

$query = "SELECT gameID FROM games WHERE gameID='" . mysqli_real_escape_string($cxn,$_GET['gameid']) . "'";

$result = mysqli_query($cxn,$query);

if ($row = mysqli_fetch_assoc($result)) {
   /* do nothing */
} else {
   die("This game either doesn't exist or has been deleted.");
}

if (isset($_GET['reverse'])) {
   if ($_GET['reverse'] == 1) {
      $query = "SELECT * FROM highscores WHERE hsGame='" . mysqli_real_escape_string($cxn,$_GET['gameid']) . "' ORDER BY hsScore ASC";
   } else {
      $query = "SELECT * FROM highscores WHERE hsGame='" . mysqli_real_escape_string($cxn,$_GET['gameid']) . "' ORDER BY hsScore DESC";
   }
} else {
   $query = "SELECT * FROM highscores WHERE hsGame='" . mysqli_real_escape_string($cxn,$_GET['gameid']) . "' ORDER BY hsScore DESC";
}

$result = mysqli_query($cxn,$query);

$i = 1;
while($row = mysqli_fetch_assoc($result)) {
   if ($i == $_GET['place']) {
      die($row['hsUser']);
   }
   $i += 1;
}

die('0');

?>