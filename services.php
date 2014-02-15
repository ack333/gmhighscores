<?php

include_once("gmolibrary.php");

include_once("header.php");
?>

<h2>Online Highscores Example</h2>
<p>This example shows you how to check and submit highscores with GMH and netread.dll.  <?php 
if (checkLogin() == false) { ?>In order to use GMH highscores with your game, you need to register for an GMH account <a href='newaccount.php'>here</a>.</p><?php } else { ?>Just go to your account page, or click <a href='account.php'>here</a> to register your games! <?php } ?>
<p>Requires: Gamemaker 7.0 Pro</p>
<p>Updated Last: June 30 2009</p>
<p><a href='gmh_example4.zip'>Download</a></p>
<?php
include_once("footer.php");
?>