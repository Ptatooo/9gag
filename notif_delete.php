<?php
include_once './header.php';
include_once './db.php';


$servername = "localhost";
$username = "root";
$password = "";
$db_name = "9gaga";

// Create connection
$link = mysqli_connect($servername, $username, $password, $db_name);

// driver napaka - popravek
mysqli_query($link, "SET NAMES 'utf8'");




$idnotifikacije=$_GET['id'];

$query="DELETE FROM notifications WHERE id='$idnotifikacije'";
mysqli_query($link, $query);

header("Location: notifications.php");

?>
