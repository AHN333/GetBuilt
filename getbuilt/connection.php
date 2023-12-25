<?php 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "getBuilt";

if (!$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{
    die("Failed to connect");
}
?>