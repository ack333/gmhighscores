<?php
//games.php
//the user game page - displays the users games, and their verify numbers.
//THIS PAGE IS NOW LOCATED ON THE ACCOUNT PAGE, this page just redirects
include_once("gmolibrary.php");
forceLogin();
header("Location: account.php");
die();
$cxn = intdatabase();
include_once("header.php");
?>

<table id='games'>
<tr>
<td class='gametd'><u>Name</u></td>
<td class='gametd'><u>ID</u></td>
<td class='gametd'><u>Verify 1</u></td>
<td class='gametd'><u>Verify 2</u></td>
<td class='gametd'><u>Verify 3</u></td>
<td class='gametd'><u>Highscores</u></td>
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
   echo "</tr>";
}
?>
<tr><td colspan='5'><a href='newgame.php'>Register New Game</a></td></tr>
</table>
<?php
include_once("footer.php");
?>