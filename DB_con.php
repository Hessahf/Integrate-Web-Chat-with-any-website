<?php
function OpenCon()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "robot_control";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) ;

return $conn;
}

function CloseCon($conn)
{
$conn -> close();
}


?>