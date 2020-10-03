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




$idodgovora=$_GET['id'];
$userid = $_SESSION['user_id'];
$date = date("Y-m-d");

$query = sprintf("UPDATE posts SET upvote = upvote + 1 WHERE id=$idodgovora");
mysqli_query($link, $query);

//query za ubacivanje notifikacija liku ciji je odgovor
$querya="SELECT * FROM comments WHERE id=$idodgovora";
$resulta= mysqli_query($link, $querya);
$rowa=mysqli_fetch_array($resulta);
$idusera=$rowa['id_usera'];

$queryup = sprintf("INSERT INTO notifications(id_usera, tip_notif, datum_notifikacije) "
. "VALUES ('$idusera', 1, '$date')");


mysqli_query($link, $queryup);

header("Location: index.php");

?>
