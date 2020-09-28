<?php
include './db.php';
include './session.php';
$headline = $_POST['headline'];
$topic = $_POST['asking'];
$details = $_POST['details'];
$ui = $_SESSION['user_id'];
$date = date("Y-m-d");

if(!empty($headline) && !empty($topic))
{
    //vse ok
    
    $query = sprintf("INSERT INTO questions(id_usera, headline, details, date_asked) "
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
    //ni ok, naj gre nazaj
    header("Location: asking.php");    
}

?>