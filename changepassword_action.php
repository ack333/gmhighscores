<?php
//login_action.php
//clean
//sets login cookie values, than checks for validness

include_once("gmolibrary.php");
forceLogin();

$cxn = intDatabase();

if (isset($_POST['oldpassword'])==false) {
   header("Location: changepassword.php?error=0"); 
   die("bigerror"); 
}
if (isset($_POST['newpassword'])==false) {
   header("Location: changepassword.php?error=0"); 
   die("bigerror"); 
}
if (isset($_POST['retypepassword'])==false) {
   header("Location: changepassword.php?error=0"); 
   die("bigerror"); 
}

if ($_POST['retypepassword'] == $_POST['newpassword']) {/*do nothing*/} else {
   header("Location: changepassword.php?error=2"); 
   die("bigerror"); 
}

$query = "SELECT * FROM users WHERE userName = '" . getCurrentUser() . "'";

$result = mysqli_query($cxn,$query) or die('error2');

if ($row = mysqli_fetch_assoc($result)) {
   if ($row['userPassword'] == $_POST['oldpassword']) {
      $query = "UPDATE users SET userPassword='" . mysqli_real_escape_string($cxn,$_POST['newpassword']) . "' WHERE userName = '" . getCurrentUser() . "'";
      mysqli_query($cxn,$query) or die('error2');
      header('Location: login.php?notice=4');
      die("bigerror");
   } else {
      header('Location: changepassword.php?error=1'); 
      die("bigerror");
   }
} else {
   header('Location:changepassword.php?error=0'); 
   die("bigerror");
}

?>