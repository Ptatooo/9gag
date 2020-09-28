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

   <form action="question_inserting.php" method="post">
   <input type="text" name="headline" placeholder="Headline" required> <br> <br>
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
