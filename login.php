<html>
<!-- All the files that are required -->
<head>
<script src="forms.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="forms.css">



</head>
<body>
<!-- LOGIN FORM -->
<div align="center">
<div class="text-center" style="padding:50px 0">
	<div class="logo">Login</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form action="login_check.php" method="post" id="login-form" class="text-left">
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="email" class="sr-only">Email</label> <br>
						<input type="email" class="form-control" id="email" name="email" placeholder="email" required>
					</div>
					<div class="form-group">
						<label for="pass" class="sr-only">Password</label> <br>
						<input type="password" class="form-control" id="pass" name="pass" placeholder="password" required>
					</div>
				</div>
				<input type="submit" value=">" class="login-button">
				
			</div>
			<div class="etc-login-form">
				<p>New user? <a href="register.php">Create new account</a></p>
			</div>
		</form>
	</div>
	<!-- end:Main Form -->
</div>
</div>
</body>
</html>