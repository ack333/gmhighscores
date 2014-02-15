<?php

include_once("gmolibrary.php");

include_once("header.php");

if (!isset($_GET['gameid'])) {
    header("Location: index.php");
    die();
}

?>

<center>Copy the text and paste it into a website to embed this highscore table.</center>

<center>
<form>
<input type='text' value='<iframe src ="http://www.gmhighscores.com/highscores_iframe.php?gameid=<?php echo $_GET['gameid']; ?>" width="400" height="300"><p>Your browser does not support iframes.</p></iframe>'>



</form>
</center>

<center><a href='account.php'>Back</a></center>

<?php
include_once("footer.php");
?>