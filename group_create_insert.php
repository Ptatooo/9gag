<?php
include './db.php';
include './session.php';
$imegrupe = $_POST['ime'];
$opisgrupe = $_POST['opis'];




if(!empty($imegrupe) && !empty($opisgrupe)){



    $sql = "INSERT INTO groups(imegrupe, opis) VALUES (?,?)";
   $stmt= $pdo->prepare($sql);
   $stmt->execute([$imegrupe, $opis]);



  header("Location: groups.php");

    } else {


      header("Location: group_create.php");
    }
}



?>
