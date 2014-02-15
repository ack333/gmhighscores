<?php
//login.php
//the login page - displays login form.
include_once("gmolibrary.php");
if (checkLogin()==true) {
   header("Location: index.php");
}
include_once("header.php");
?>

<form action='login_action.php' method='POST'>
<table>
<tr>
<td><u>Login</u></td>
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
<td><input name='submit' type='submit' value='Login'></td>
<td><a href='newaccount.php'>Create a free account</a></td>
</tr>
</table>
</form>

<?php
include_once("footer.php");
?>