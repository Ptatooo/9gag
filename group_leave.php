<?php
include_once './db.php';
include './session.php';

$userid = $_SESSION['user_id'];
$idgrupee=$_GET['id'];

$query = sprintf("UPDATE users SET id_grupe = NULL WHERE id = '$userid'");

mysqli_query($link, $query);

header("Location: groups.php");

?>