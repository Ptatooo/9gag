<?php
include_once './header.php';
include_once './db.php';

$idodgovora=$_GET['id'];
$userid = $_SESSION['user_id'];
$date = date("Y-m-d");

$query = sprintf("UPDATE answers SET upvote = upvote + 1 WHERE id=$idodgovora");
mysqli_query($link, $query);

//query za ubacivanje notifikacija liku ciji je odgovor
$querya="SELECT * FROM answers WHERE id=$idodgovora";
$resulta= mysqli_query($link, $querya);
$rowa=mysqli_fetch_array($resulta);
$idusera=$rowa['id_usera'];

$queryup = sprintf("INSERT INTO notifications(id_usera, tip_notif, datum_notifikacije) "
. "VALUES ('$idusera', 1, '$date')");


mysqli_query($link, $queryup); 

header("Location: index.php");

?>