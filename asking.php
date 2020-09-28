<?php
include_once './header.php';
include './db.php';
?>
   <div align="center">
   <h6 class="my-4">Ask a question, about ANYTHING!</h6>

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
   <input type="submit" class="btn btn-sm btn-light" value="Submit question">
   </form>
   </div>