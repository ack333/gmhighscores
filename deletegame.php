<?php
//newaccount.php
//clean
//shows the new account form!
include_once("gmolibrary.php");
forceLogin();
include_once("header.php");
?>
<form action='deletegame_action.php' method='POST'>
<table>
<tr>
<td colspan='2'><center><u>Are you absolutely sure you want to delete this game?</u></center></td>
<td></td>
</tr>
<tr>
<td><input name='submit' type='submit' value='Delete Game'></td>
<td><a href='account.php'>Back</a></td>
</tr>
</table>
</form>
<?php
include_once("footer.php");
?>