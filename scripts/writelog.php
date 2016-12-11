<?php
$ipaddress = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER ['HTTP_USER_AGENT'];
$request = $_SERVER['QUERY_STRING'];
$timestamp = date('Y-m-d H:i:s',$_SERVER ['REQUEST_TIME']);
$eintragen = mysqli_query($db, "INSERT INTO timetable.log_connection (ipaddress,browser,request,timestamp) VALUES ('$ipaddress','$browser','$request','$timestamp');");
?>