<?php
/*clean*/
include_once("souphouse.php");
include_once("gmolibrary.php");

$cxn = mysqli_connect($dbhost, $dbuser, $dbpassword) or die("Error1928!");
mysqli_select_db($cxn, $dbname) or die("Error1092!");
forceLogin();
include_once("header.php");
?>
<center><u>Your Account</u></center>
<table id='games'>
<tr>
<td class='gametd'><u>Your Games</u></td>
<td class='gametd'><u></u></td>
<td class='gametd'><u></u></td>
<td class='gametd'><u></u></td>
<td class='gametd'><u></u></td>
<td class='gametd'><u></u></td>
</tr>
<tr>
<td class='gametd'><u>Name</u></td>
<td class='gametd'><u>ID</u></td>
<td class='gametd'><u>Verify 1</u></td>
<td class='gametd'><u>Verify 2</u></td>
<td class='gametd'><u>Verify 3</u></td>
<td class='gametd'><u>Highscores</u></td>
<td class='gametd'><u>Embed Highscores</u></td>
<td class='gametd'><u>Empty Highscores</u></td>
</tr>

<?php
$query = "SELECT * FROM games WHERE gameUser='" . getCurrentUserID() . "'";
$result = mysqli_query($cxn,$query);
while ($row = mysqli_fetch_assoc($result)) {
   echo "<tr>";
   echo "<td class='gametd'>" . $row['gameName'] . "</td>";
   echo "<td class='gametd'>" . $row['gameID'] . "</td>";
   echo "<td class='gametd'>" . $row['gameVerifyA'] . "</td>";
   echo "<td class='gametd'>" . $row['gameVerifyB'] . "</td>";
   echo "<td class='gametd'>" . $row['gameVerifyC'] . "</td>";
   echo "<td class='gametd'><a href='highscores.php?gameid=" . $row['gameID'] . "'>View</a></td>";
   echo "<td class='gametd'><a href='highscoresembed.php?gameid=" . $row['gameID'] . "'>Embed</a></td>";
   echo "<td class='gametd'><a href='clearhighscores_action.php?gameid=" . $row['gameID'] . "'>Clear</a></td>";
   echo "</tr>";
}
?>
<tr><td colspan='5'><a href='newgame.php'>Register New Game</a></td></tr>
</table>
<div id='clockworkad'>
Is GMH not enough for you?  Did you want statistics too?  A nicer looking site?  Check out our new site at <a href='http://madewithclockwork.com'>madewithclockwork.com</a>.
</div>
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
<td></td>
</tr>
</table>
</form>
<?php
include_once("footer.php");
?>