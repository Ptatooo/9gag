<?php
include 'db.php';
include 'sql.php';
include './session.php';
$headline = $_POST['headline'];
$topic = $_POST['asking'];
$details = $_POST['details'];
$ui = $_SESSION['user_id'];
$date = date("Y-m-d");
$url = $_POST['url'];



if(!empty($headline) && !empty($topic))
{
    //vse ok

    $query = sprintf("INSERT INTO posts(id_usera, headline, details, date_posted, image) "
            . "VALUES ('$ui','$headline','$details','$date','$url')");

    //echo $query; die();

    mysqli_query($link, $query);

     $idquestiona = mysqli_insert_id($link);

     $query1 = sprintf("INSERT INTO topics_posts(id_topica, id_post) "
     . "VALUES (((SELECT id FROM topics WHERE topic = '$topic')),'$idquestiona')");

     mysqli_query($link, $query1);

    header("Location: index.php");
}
else
{

    header("Location: uploading.php");
}

?>
