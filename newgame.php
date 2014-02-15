<?php
//newaccount.php
//shows the new account form!
include_once("gmolibrary.php");
forceLogin();
include_once("header.php");
?>
<form action='newgame_action.php' method='POST' name='createaccount'>
<table>
<tr>
<td colspan='2'><u>Register a game</u></td>
<td></td>
</tr>
<tr>
<td>Name:</td>
<td><input name='name' type='text'></td>
</tr>
<tr>
<td><input name='submit' type='submit' value='Register Game'></td>
<td><a href='account.php'>Back</a></td>
</tr>
</table>
</form>
<?php
include_once("footer.php");
?>