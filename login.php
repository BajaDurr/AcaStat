<!DOCTYPE html>
<html lang="en">
<!-- Derived from: https://getbootstrap.com/docs/4.0/examples/sign-in/ -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>AcaStat</title>
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<!-- Custom styles for this template -->
	<link href="css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

	<form id="someForm" class="form-signin" action="php/login_check.php" method="post">
		<img class="mb-4" src="assets/ACASTAT_LOGO.png" alt="" width="150" height="150"></img>
		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
		<input type="username" id="inputUsername" class="form-control" name="Username" placeholder="User Name" required autofocus>
		<input type="password" id="inputPassword" class="form-control" name="Password" placeholder="Password" required>
		<p style="color:red"><?php isset($_GET['error']) ? htmlspecialchars($_GET['error']) : ''; ?></p>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="Log In" value="Log In" onclick="myFunction()">Log In</button>
	</form>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>