<?php
//newaccount.php
//shows the new account form!
include_once("gmolibrary.php");
include_once("header.php");
?>
<form action='newaccount_action.php' method='POST' name='createaccount'>
<table>
<tr>
<td colspan='2'><u>Create a new account</u></td>
<td></td>
</tr>
<tr>
<td>Username:</td>
<td><input name='username' type='text'></td>
</tr>
<tr>
<td>Password:</td>
<td><input name='password' type='password'></td>
</tr>
<tr>
<td>Retype Password:</td>
<td><input name='retypepassword' type='password' onchange='checkPasswords()'></td>
</tr>
<tr>
<td>Email Address:</td>
<td><input name='email' type='text'></td>
</tr>
<tr>
<td><input name='submit' type='submit' value='Create Account'></td>
<td>Already got an account? <a href='login.php'>Login in</a>.</td>
</tr>
</table>
</form>
<?php
include_once("footer.php");
?>