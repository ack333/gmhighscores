<?php

include_once("gmolibrary.php");

include_once("header.php");
?>
<center><img src='gmhlogolarge.gif'></center>
<center>We create free online highscores for your gamemaker games.</center>
<br><br>
<?php
if (checkLogin() == false) {
?>
<center><a href='newaccount.php'>Sign up</a> or <a href='login.php'>sign in</a></center>

<?php } else { ?>

<center><a href='http://www.gmhighscores.com/wordpress/'>Check out our new blog!</a></center>
<center><a href='welcome.php'>New users come here!</a></center>

<?php } ?>

<?php
include_once("footer.php");
?>