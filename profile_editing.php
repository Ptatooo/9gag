<?php
include './session.php';
include_once './db.php';
$userid = $_SESSION['user_id'];

$queryp="SELECT * FROM users WHERE id=$userid";
$resultp = mysqli_query($link, $queryp);
$rowp = mysqli_fetch_array($resultp);
$ime=$rowp['ime'];
$priimek=$rowp['priimek'];
$email=$rowp['email'];

?>


<html>
<head>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

<div class="well">
    <ul class="nav nav-tabs">
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home" align="center">
      
        <form action="profile_editing_insert.php" method="post" id="tab" enctype="multipart/form-data">
            <label>First Name</label>
            <input type="text" value="<?php echo $ime;?>" name="ime" class="input-xlarge">
            <label>Last Name</label>
            <input type="text" value="<?php echo $priimek;?>" name="priimek" class="input-xlarge">
            <label>Email</label>
            <input type="text" value="<?php echo $email;?>" name="email" class="input-xlarge">
            <label>Password</label>
            <input type="password" name="pw" class="input-xlarge">
            <label>Profile picture</label>
            <input type="file" class="form-control" name="fileToUpload2" id="fileToUpload2">
          	<div>
        	    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                </form>
                <a href="index.php" class="btn btn-primary">Home</a>
        	</div>
      </div>
  </div>
  </body>
  </html>