<?php
require './fb-init.php';
header("Location:$login_url");
 ?>
<?php if(isset($_SESSION['access_token'])): ?>
  <a href="logout.php">Logout</a>
<?php else: ?>


<?php endif; ?>
