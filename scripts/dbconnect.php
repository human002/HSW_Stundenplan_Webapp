<?php
$db = mysqli_connect("localhost", "Datenbankname", "Username", "Password");
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
?>