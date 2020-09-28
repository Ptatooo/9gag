<?php
include_once './header.php';



           $servername = "localhost";
           $username = "root";
           $password = "";
           $db_name = "9gaga";

           // Create connection
           $link = mysqli_connect($servername, $username, $password, $db_name);


           mysqli_query($link, "SET NAMES 'utf8'");

?>
   <div align="center">
   <h6 class="my-4">Post ANYTHING!</h6>

   <form action="upload_insert.php" method="post">
   <input type="text" name="headline" placeholder="Headline" required> <br> <br>


   <?php
        if(isset($_POST['but_upload'])){

          $name = $_FILES['file']['name'];
          $target_dir = "upload/";
          $target_file = $target_dir . basename($_FILES["file"]["name"]);

          // Select file type
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          // Valid file extensions
          $extensions_arr = array("jpg","jpeg","png","gif");

          // Check extension
          if( in_array($imageFileType,$extensions_arr) ){

            // Convert to base64
            $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
            // Insert record
            $query = "insert into images(image) values('".$image."')";
            mysqli_query($con,$query);

            // Upload file
            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
          }

        }
        ?>

        <form method="post" action="" enctype='multipart/form-data'>
          <input type='file' name='file' />
          <input type='submit' value='Submit' name='but_upload'>
        </form>




   Pick a topic: <br> <br>
   <select name="asking">
<?php
$sqll = mysqli_query($link, "SELECT topic FROM topics");
$roww = mysqli_num_rows($sqll);
while ($roww = mysqli_fetch_array($sqll)){
echo "<option value='". $roww['topic'] ."'>" .$roww['topic'] ."</option>" ;
}
?>
</select> <br> <br>
   <textarea placeholder="Details" rows = "5" cols = "50" name="details"></textarea> <br> <br>
   <input type="submit" class="btn btn-sm btn-light" value="Post">
   </form>
   </div>
