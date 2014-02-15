<?php
/*clean*/
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
   echo "That game either doesn't exist or has been deleted.";
   die();
}
?>

<html>
<head>
<style>
body {
   color:#FFF;
   background-color:#000;
   
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
</style>
</head>
<body>



Highscores provided by <a href='http://www.gmhighscores.com'>GMhighscores.com</a><br>
<a href='http://www.gmhighscores.com'>Get free online highscores for your game today!</a>

<?php

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
echo "</tr>";

$i = 1;
while($row = mysqli_fetch_assoc($result)) {
   echo "<tr class='highscore'>";
   echo "<td class='placetd'>" . $i . "</td>";
   echo "<td class='nametd'>" . htmlspecialchars($row['hsUser']) . "</td>";
   echo "<td class='scoretd'>" . $row['hsScore'] . "</td>";
   echo "</tr>";
   $i += 1;
}

echo "</table>";
echo "</body></html>";
?>