<?php
include './sql.php';
include './session.php';




$imegrupe = $_POST['ime'];
$opisgrupe = $_POST['opis'];

if(!empty($imegrupe) && !empty($opisgrupe))
{
    //vse ok

    $query = sprintf("INSERT INTO groups(imegrupe, opis) "
            . "VALUES ('$imegrupe','$opisgrupe')");

    //echo $query; die();

    mysqli_query($link, $query);

    header("Location: groups.php");
}
else
{
    //ni ok, naj gre nazaj
    header("Location: group_create.php");
}

?>
