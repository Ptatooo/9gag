<?php
include_once 'db.php';
require 'session.php';

$username = $_POST ['username'];
$email = $_POST ['email'];
$pass =$_POST ['pass'];
$adminkod = $_POST['adminkod'];
$tipu = '2';


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
    'tip_u' => $tipu,

];


}

if(!empty($username) && !empty($email) && !empty($pass) &&  empty($adminkod))
{

    $sql = "INSERT INTO users (username, email, pass) VALUES (:username, :email, :password)";
    $stmt= $pdo->prepare($sql);



    if ($stmt->execute($data))
    {



          $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
          $stmt->execute([$_POST['username']]);
          $user = $stmt->fetch();

          if ($user && password_verify($_POST['pass'], $user['pass']))
          {
            $_SESSION['username']=$user['username'];
            $_SESSION['user_id']=$user['id'];

      header( "refresh:0;url=index.php" );

          }
      }


  }




else if(!empty($username) && !empty($email) && !empty($email) && ($adminkod == 'geslo'))
{
  $sql = "INSERT INTO users (username, email, pass, tip_u) VALUES (:username, :email, :password, :tip_u)";
  $stmt= $pdo->prepare($sql);



  if ($stmt->execute($data))
  {


    $username = $_POST['username'];
    $pass = $_POST['pass'];



        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$_POST['username']]);
        $user = $stmt->fetch();

        if ($user && password_verify($_POST['pass'], $user['pass']))
        {
          $_SESSION['username']=$user['username'];
          $_SESSION['user_id']=$user['id'];
          $_SESSION['tipu']=$user['tip_u'];

    header( "refresh:0;url=index.php" );

        }
    }



}
else {
header("Location: index.php");
}




 ?>
