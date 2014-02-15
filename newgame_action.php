<?php
//newgame_action.php
//creates a new game!

include_once("gmolibrary.php");
forceLogin();

//check the input
if (isset($_POST['name'])==false) {
   header("Location: newgame.php?error=0");
   die("bigerror");
}

if (ereg("^.+$",$_POST['name'])==false) {
   header("Location: newgame.php?error=4");
   die("bigerror");
}

$cxn = intDatabase();

//check if the game name is already in use.
$query = "SELECT gameName FROM games WHERE gameName='" . mysqli_real_escape_string($cxn,$_POST['name']) . "'";
$result = mysqli_query($cxn,$query);

if (mysqli_fetch_assoc($result)) {
   header("Location: newgame.php?error=6");
   die("bigerror");
}

//create the game
$query = "INSERT INTO games (gameName,gameUser,gameVerifyA,gameVerifyB,gameVerifyC) VALUES ('" . mysqli_real_escape_string($cxn,$_POST['name']) . "','";
$query = $query.getCurrentUserID() . "','" . rand(100000,10000000) . "','" . rand(1,100) . "','" . rand(10000,100000) ."')";
$result = mysqli_query($cxn,$query);

//redirect the browser to the account page
header("Location: account.php?notice=3");

?>