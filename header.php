<?php
include './session.php';
include './db.php';
include_once "vendor/autoload.php";
include './sql.php';

?>

<!-- Index -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="indeks.css">
<script src="indeks.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body>

<?php

        if(!isset($_SESSION['username'])){ //if login in session is not set

          echo '
          <!-- Navigation -->
          <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
             <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav mr-auto">
                   <li class="nav-item">
                      <a href="" ><img src="uploads/logo.jpg" width="10%"  class="img-responsive" /></a>
                   </li>

                   </ul>

                   <ul class="navbar-nav ml-auto">

                      <li class="avatar-profile d-none d-sm-block ">
                         <a href="" ><img src="uploads/basicavatar.jpg" class="img-responsive" /></a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="#myModal" class="img-responsive" data-toggle="modal"> Login </a>
                    </li>
                    <li class="nav-item ">
                      <a class="nav-link" href="#myModal2" class="img-responsive" data-toggle="modal"> SignUp </a>
                    </li>


                   </ul>
                </div>
             </div>
          </nav>

          <div id="myModal" class="modal fade">
          	<div class="modal-dialog modal-login">
          		<div class="modal-content">
          			<form action="login_check.php" method="post">
          				<div class="modal-header">
          					<h4 class="modal-title">Login</h4>
          					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          				</div>
          				<div class="modal-body">';


                  if (isset($_GET['error'])) {

                          echo '<div class="alert alert-danger" role="alert">
                      Wrong username or password, try again!

                    </div>';
                  }
echo '
          					<div class="form-group">
          						<label>Username</label>
          						<input name="username" type="text" class="form-control" required="required">
          					</div>
          					<div class="form-group">
          						<div class="clearfix">
          							<label>Password</label>

          						</div>

          						<input name="pass" type="password" class="form-control" required="required">
          					</div>
          				</div>
          				<div class="modal-footer justify-content-between">

          					<input type="submit" class="btn btn-primary" value="Login">
          				</div>
          			</form>
          		</div>
          	</div>
          </div>
          </body>
          </html>


          <!-- Modal HTML2 -->
          <div id="myModal2" class="modal fade">
          	<div class="modal-dialog modal-login">
          		<div class="modal-content">
          			<form action="registration.php" method="post">
          				<div class="modal-header">
          					<h4 class="modal-title">Become a member</h4>
          					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          				</div>
          				<div class="modal-body">
          					<div class="form-group">
          						<label>Username</label>
          						<input name="username" type="text" class="form-control" required="required">
          					</div>
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" type="text" class="form-control" required="required">
                    </div>
          					<div class="form-group">
          						<div class="clearfix">
          							<label>Password</label>

          						</div>

          						<input name="pass" type="password" class="form-control" required="required">
          					</div>
          				</div>
                  <div class="form-group">
          <label for="adminkod" class="sr-only">Admin code</label>
          <input type="password" class="form-control" id="adminkod" name="adminkod" placeholder="Admin code">
        </div>
                  <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                       <a href="refb.php"> Facebook </a>
          				<div class="modal-footer justify-content-between">

          					<input type="submit" class="btn btn-primary" value="Sign up">
          				</div>
          			</form>
          		</div>
          	</div>
          </div>
          </body>
          </html>




          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
          <?php';


        }



         else if (isset($_SESSION['username'])) {





           $userid=$_SESSION['user_id'];

           $query="SELECT avatar FROM users where id=$userid";
           $res= mysqli_query($link, $query);
           $ro= mysqli_fetch_array($res);
           $slika=$ro['avatar'];

           echo '




   <nav class="navbar navbar-expand-lg bg-dark navbar-light fixed-top">
      <div class="container-fluid">

         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
               <a href="" ><img src="uploads/logo.jpg" width="50%"  class="img-responsive" /></a>
            </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="topics.php"><i class="fa fa-edit"></i> Topics</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="notifications.php"><i class="fa fa-bell"></i> Notifications</a>
               </li>
               <li class="nav-item">
                              <a class="nav-link" href="groups.php"><i class="fa fa-edit"></i> Groups</a>
                           </li>
            </ul>
            <form action="search.php" method="post" class="form-inline my-2 my-lg-0 col-md-5">
               <input class="myform-control mr-sm-2" type="text" name="keyword"  aria-label="Search">
               <button class="btn btn-light"><i class="fa fa-search"></i></button>
            </form>
            <ul class="navbar-nav ml-auto">
               <li>
                  <a href="uploading.php" id="add-question" class="btn mybtn btn-success">Upload!</a>
               </li>
               <li class="avatar-profile d-none d-sm-block ">
                  <a href="profile_editing.php" ><img src="'; ?><?php echo "$slika" ?> <?php echo '" class="img-responsive"/></a>
               </li>
               <li>
                  <a href="logout.php" id="add-question" class="btn mybtn btn-success">Log out</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>';








 }
 ?>
