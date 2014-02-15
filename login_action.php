<?php
//login_action.php
//sets login cookie values, than checks for validness

include_once("gmolibrary.php");

$cxn = intDatabase();
if (isset($_POST['username'])==false) {
   header("Location: login.php?error=1"); 
   die("bigerror"); 
}
if (isset($_POST['password'])==false) {
   header("Location: login.php?error=1"); 
   die("bigerror"); 
}

$query = "SELECT * FROM users WHERE userName = '" . mysqli_real_escape_string($cxn,$_POST['username']) . "'";

$result = mysqli_query($cxn,$query) or die('error2');

if ($row = mysqli_fetch_assoc($result)) {
   if ($row['userPassword'] == $_POST['password']) {
      setcookie("gmousername",$_POST['username']);
      setcookie("gmopassword",$_POST['password']);
      header('Location: index.php?notice=1');
      die("bigerror");
   } else {
      header('Location: login.php?error=1'); 
      die("bigerror");
   }
} else {
   header('Location: login.php?error=1'); 
   die("bigerror");
}

?>