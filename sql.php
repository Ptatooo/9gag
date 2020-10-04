<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "9gaga";

// Create connection
$link = mysqli_connect($servername, $username, $password, $db_name);

// driver napaka - popravek
mysqli_query($link, "SET NAMES 'utf8'");


 ?>
