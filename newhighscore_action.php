<?php
if (!isset($_GET['score'])) {
   die("S");
}
if (!isset($_GET['user'])) {
   die("U");
}
if (!isset($_GET['verify'])) {
   die("V");
}
if (!isset($_GET['game'])) {
   die("G");
}

include_once("gmolibrary.php");

forceNetread();

$cxn = intDatabase();

$query = "SELECT * FROM games WHERE gameid='" . mysqli_real_escape_string($cxn,$_GET['game']) . "'";
$result = mysqli_query($cxn,$query);

if ($row = mysqli_fetch_assoc($result)) {
   $verifyanswer = round(($_GET['score'] + $row['gameVerifyA']) / $row['gameVerifyB'],0);
   while ($verifyanswer >= $row['gameVerifyC']) {
      $verifyanswer = $verifyanswer - $row['gameVerifyC'];
   }
   
   if ($_GET['verify'] == $verifyanswer) {
      $query = "INSERT INTO highscores (hsGame,hsScore,hsUser) VALUES (".mysqli_real_escape_string($cxn,$_GET['game']).",".mysqli_real_escape_string($cxn,$_GET['score']).",'".mysqli_real_escape_string($cxn,$_GET['user'])."')";
      mysqli_query($cxn,$query);
      die("1");
   } else {
      die('0');
   }
} else {
   die("3");
}
?>