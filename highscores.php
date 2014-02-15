<?php
include_once("gmolibrary.php");

if (!isset($_GET['gameid'])) {
   header("Location: index.php");
   die();
}

$cxn = intDatabase();

$query = "SELECT * FROM games WHERE gameID='" . mysqli_real_escape_string($cxn,$_GET['gameid']) . "'";
$result = mysqli_query($cxn,$query);

if ($row = mysqli_fetch_assoc($result)) {
   $gameuser = $row['gameUser'];
} else {
   include_once("header.php");
   echo "That game either doesn't exist or has been deleted.";
   include_once("footer.php");
   die();
}

$currentuserid = getCurrentUserID();
$useriscreator = false;
if ($currentuserid != false) {
   if ($currentuserid == $gameuser) {
      $useriscreator = true;
   }
}

include_once("header.php");

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

echo "<table class='highscore'>";

echo "<tr>";
echo "<td class='placetd'><u>#</u></td>";
echo "<td class='nametd'><u>Name</u></td>";
echo "<td class='scoretd'><u>Score</u></td>";
if ($useriscreator == true) {echo "<td><u>Delete</u></td>";}
echo "</tr>";

$i = 1;
while($row = mysqli_fetch_assoc($result)) {
   echo "<tr class='highscore'>";
   echo "<td class='placetd'>" . $i . "</td>";
   echo "<td class='nametd'>" . htmlspecialchars($row['hsUser']) . "</td>";
   echo "<td class='scoretd'>" . $row['hsScore'] . "</td>";
   if ($useriscreator == true) {echo "<td class='scoretd'><a href='deletehighscore_action.php?gameid=" . $_GET['gameid'] . "&highscoreid=" . $row['hsID'] . "'>Delete</a></td>";}
   echo "</tr>";
   $i += 1;
}

echo "</table>";
include_once("footer.php");
?>