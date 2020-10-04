<?php
include_once './header.php';
include 'sql.php';

?>
   <div align="center">
   <h6 class="my-4">Post ANYTHING!</h6>

   <form action="upload_insert.php" method="post">
   <input type="text" name="headline" placeholder="Headline" required> <br> <br>
<input type="url" name="url" placeholder="URL" required> <br> <br>

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

       <div>
         <input type="submit" name="submit" class="btn btn-primary" value="Post">
           </form>

   </form>
   </div>
