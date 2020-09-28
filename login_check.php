
<?php
include_once './db.php';
include_once './session.php';

$username = $_POST['username'];
$pass = $_POST['pass'];

if (!empty($username) && !empty($pass)) {

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['pass'], $user['password']))
    {
      $_SESSION['username']=$user['username'];
      $_SESSION['user_id']=$user['id'];

header( "refresh:0;url=index.php" );

    } else {

      echo $username;
      echo $pass;
      header( "refresh:3; url=index.php" );

    }
}
?>
