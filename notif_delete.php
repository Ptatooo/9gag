<?php
include_once './header.php';
include_once './db.php';

$idnotifikacije=$_GET['id'];

$query="DELETE FROM notifications WHERE id='$idnotifikacije'";
mysqli_query($link, $query);

header("Location: notifications.php");

?>