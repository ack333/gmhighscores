<?php
//newaccount_action.php
//actually creates the account!

include_once("gmolibrary.php");

//check the input
if (isset($_POST['username'])==false) {
   header("Location: newaccount.php");
   die("bigerror");
}
if (isset($_POST['password'])==false) {
   header("Location: newaccount.php");
   die("bigerror");
}
if (isset($_POST['retypepassword'])==false) {
   header("Location: newaccount.php");
   die("bigerror");
}
if ($_POST['password'] == $_POST['retypepassword']) {

} else {
   header("Location: newaccount.php?error=2");
   die("bigerror");
}
if (isset($_POST['email'])==false) {
   header("Location: newaccount.php");
   die("bigerror");
}
if (ereg("^.+$",$_POST['username'])==false) {
   header("Location: newaccount.php?error=4");
   die("bigerror");
}
if (ereg("^.+$",$_POST['password'])==false) {
   header("Location: newaccount.php?error=4");
   die("bigerror");
}
if (ereg("^.+(@).+\..+$",$_POST['email'])==false) {
   header("Location: newaccount.php?error=4");
   die("bigerror");
}

$cxn = intDatabase();

//check if the username is already in use.
$query = "SELECT userName FROM users WHERE userName='" . mysqli_real_escape_string($cxn,$_POST['username']) . "'";
$result = mysqli_query($cxn,$query);

if (mysqli_fetch_assoc($result)) {
   header("Location: newaccount.php?error=3");
   die("bigerror");
}

//check if the email is already in use.
$query = "SELECT userEmail FROM users WHERE userEmail='" . mysqli_real_escape_string($cxn,$_POST['email']) . "'";
$result = mysqli_query($cxn,$query);

if (mysqli_fetch_assoc($result)) {
   header("Location: newaccount.php?error=3");
   die("bigerror");
}

//create the account
$query = "INSERT INTO users (userName,userPassword,userEmail) VALUES ('" . mysqli_real_escape_string($cxn,$_POST['username']) . "','";
$query = $query . mysqli_real_escape_string($cxn,$_POST['password']) . "','" . mysqli_real_escape_string($cxn,$_POST['email']) . "')";
$result = mysqli_query($cxn,$query);

//send an email to them!
mail(mysqli_real_escape_string($cxn,$_POST['email']),"Your Gamemaker Highscores Account","Congratulations!  Your Gamemaker Highscores account has been created!\nYour account information is below:\n\nUsername: ".htmlspecialchars($_POST['username'])."\nPassword: ".htmlspecialchars($_POST['password'])."\n\nYou can register new games here:\nhttp://www.gmhighscores.com/games.php\n\nWelcome to Gamemaker Highscores!!","From: gamemakeronlinehelp@gmail.com");

/*redirect the user*/
header("Location: welcome.php");

?>