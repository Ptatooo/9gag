<?php
include './db.php';
$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$adminkod = $_POST['adminkod'];

//img
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// preveri podatke
if(!empty($ime) && !empty($priimek) && !empty($email) && !empty($pass1) && ($pass1 == $pass2) && empty($adminkod))
{
    //vse ok
    //zakodiram geslo
    $pass = md5($pass1);
    $query = sprintf("INSERT INTO users(ime, priimek, email, pass, avatar, tip_usera) "
            . "VALUES ('%s','%s','%s', '$pass', '$target_file', '1')",
    mysqli_real_escape_string($link, $ime),
    mysqli_real_escape_string($link, $priimek),
    mysqli_real_escape_string($link, $email));
    
    //echo $query; die();
    
    mysqli_query($link, $query);
    
    header("Location: login.php");        
            
}

else if(!empty($ime) && !empty($priimek) && !empty($email) && !empty($pass1) && ($pass1 == $pass2) && ($adminkod == 'kod'))
{
    //vse ok
    //zakodiram geslo
    $pass = md5($pass1);
    $query = sprintf("INSERT INTO users(ime, priimek, email, pass, tip_usera) "
            . "VALUES ('%s','%s','%s', '$pass', '2')",
    mysqli_real_escape_string($link, $ime),
    mysqli_real_escape_string($link, $priimek),
    mysqli_real_escape_string($link, $email));
    
    //echo $query; die();
    
    mysqli_query($link, $query);
    
    header("Location: login.php");        
            
}

else
{
    //ni ok, naj gre nazaj na registracijo
    header("Location: register.php");    
}


?>