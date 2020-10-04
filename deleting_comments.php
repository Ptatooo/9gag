<?php
include_once './header.php';
include_once './sql.php';

$idodgovora=$_GET['id'];
$userid = $_SESSION['user_id'];

$query="DELETE FROM comments WHERE id='$idodgovora'";
mysqli_query($link, $query);

header("Location: index.php");

?>
