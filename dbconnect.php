<?php

$server = "<your server name>";
$user = "<your username>";
$password = "<your password>";
$db = "<your database name>";

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn) {
    die("Connection Failed:".mysqli_connect_error());
}
else{
    session_start();
}

?>