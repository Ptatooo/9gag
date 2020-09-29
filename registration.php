<?php
include_once 'db.php';
require 'session.php';

$username = $_POST ['username'];
$email = $_POST ['email'];
$pass =$_POST ['pass'];




$query = $pdo->prepare( "SELECT email FROM users WHERE email = ?" );
$query->bindValue( 1, $email );
$query->execute();

if ( $query->rowCount() > 0 ) { # If rows are found for query
     echo "Email already exists in database!";
     header( "refresh:3;url=index.php" );
}
 else {




$pwd=password_hash($pass,PASSWORD_DEFAULT);


$password=$pwd;

$data = [
    'username' => $username,
    'email' => $email,
    'password' => $password,


];

$sql = "INSERT INTO users (username, email, pass) VALUES (:username, :email, :password)";
$stmt= $pdo->prepare($sql);



if ($stmt->execute($data))
{
  ;


header( "url=index.php" );


}



}




 ?>
