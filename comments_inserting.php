<?php

include './session.php';
$answer = $_POST['comment'];
$ui = $_SESSION['user_id'];
$date = date("Y-m-d");
$idpitanja = $_POST['idpitanja'];

           $servername = "localhost";
           $username = "root";
           $password = "";
           $db_name = "9gaga";

           // Create connection
           $link = mysqli_connect($servername, $username, $password, $db_name);


           mysqli_query($link, "SET NAMES 'utf8'");


$queryna="SELECT * FROM users WHERE id='$ui'";
$resultna= mysqli_query($link, $queryna);
$rowna= mysqli_fetch_array($resultna);
$dzoin=$rowna['id_grupe'];


$querya="SELECT * FROM questions WHERE id=$idpitanja";
$resulta= mysqli_query($link, $querya);
$rowa=mysqli_fetch_array($resulta);
$idusera=$rowa['id_usera'];


if(!empty($answer) && empty($dzoin))
{
    //vse ok

    $query = sprintf("INSERT INTO comments(id_questiona, id_usera, answer, date_commented) "
            . "VALUES ('$idpitanja','$ui','$answer','$date')");

    mysqli_query($link, $query);

    $queryup = sprintf("INSERT INTO notifications(id_usera, tip_notif, datum_notifikacije) "
. "VALUES ('$idusera', 2, '$date')");


mysqli_query($link, $queryup);

    header("Location: index.php");
}
else if(!empty($answer) && !empty($dzoin))
{

    $query = sprintf("INSERT INTO comments(id_questiona, id_usera, answer, date_commented) "
            . "VALUES ('$idpitanja','$ui','$answer','$date')");

            mysqli_query($link, $query);

     $querynab = sprintf("UPDATE groups SET steviloodgovora = steviloodgovora + 1 WHERE id = '$dzoin'");

     mysqli_query($link, $querynab);

$queryupp = sprintf("INSERT INTO notifications(id_usera, tip_notif, datum_notifikacije) "
. "VALUES ('$idusera', 1, '$date')");


mysqli_query($link, $queryupp);

    header("Location: index.php");
}
else {
    header("Location: index.php");
}

?>
