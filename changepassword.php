<?php
//newaccount.php
//clean
//shows the new account form!
include_once("gmolibrary.php");
forceLogin();
include_once("header.php");
?>
<form action='changepassword_action.php' method='POST' name='changepassword'>
<table>
<tr>
<td colspan='2'><u>Change Your Password</u></td>
<td></td>
</tr>
<tr>
<td>Old Password:</td>
<td><input name='oldpassword' type='password'></td>
</tr>
<tr>
<td>New Password:</td>
<td><input name='newpassword' type='password'></td>
</tr>
<tr>
<td>Retype Password:</td>
<td><input name='retypepassword' type='password'></td>
</tr>
<tr>
<td><input name='submit' type='submit' value='Change Password'></td>
<td><a href='account.php'>Back</a></td>
</tr>
</table>
</form>
<?php
include_once("footer.php");
?>