<?php
include './session.php';
$headline = $_POST['headline'];
$topic = $_POST['asking'];
$details = $_POST['details'];
$ui = $_SESSION['user_id'];
$date = date("Y-m-d");


           $servername = "localhost";
           $username = "root";
           $password = "";
           $db_name = "9gaga";

           // Create connection
           $link = mysqli_connect($servername, $username, $password, $db_name);


           mysqli_query($link, "SET NAMES 'utf8'");

if(!empty($headline) && !empty($topic))
{
    //vse ok

    $query = sprintf("INSERT INTO posts(id_usera, headline, details, date_posted) "
            . "VALUES ('$ui','$headline','$details', '$date')");

    //echo $query; die();

    mysqli_query($link, $query);

     $idquestiona = mysqli_insert_id($link);

     $query1 = sprintf("INSERT INTO topics_questions(id_topica, id_questiona) "
     . "VALUES (((SELECT id FROM topics WHERE topic = '$topic')),'$idquestiona')");

     mysqli_query($link, $query1);

    header("Location: index.php");
}
else
{

    header("Location: asking.php");
}

?>
