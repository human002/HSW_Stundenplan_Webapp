<p><a href="index.php">back</a></p>

<?php
include('konfiguration.php');
$db_link = mysqli_connect (
                     $MYSQL_HOST, 
                     $MYSQL_BENUTZER, 
                     $MYSQL_KENNWORT, 
                     $MYSQL_DATENBANK
                    );
 
$sql = "select * from log_dbupdate";
 
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
  die('Ungültige Abfrage: ' . mysqli_error());
}
 
echo '<table border="1">';
while ($zeile = mysqli_fetch_array( $db_erg, MYSQL_ASSOC))
{
  echo "<tr>";
  echo "<td>". $zeile['id'] . "</td>";
  echo "<td>". $zeile['timestamp'] . "</td>";
  echo "</tr>";
}
echo "</table>";
 
mysqli_free_result( $db_erg );
?>

