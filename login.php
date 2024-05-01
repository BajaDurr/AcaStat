<?php
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '<!-- Derived from: https://getbootstrap.com/docs/4.0/examples/sign-in/ -->';
echo '<head>';
echo '<meta charset="utf-8" />';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge" />';
echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
echo '<title>AcaStat: Sign In</title>';
echo '<!-- Bootstrap core CSS -->';
echo '<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />';
echo '<!-- Custom styles for this template -->';
echo '<link href="css/signin.css" rel="stylesheet">';
echo '</head>';

echo '<body class="text-center">';

echo '<form id="someForm" class="form-signin" action="php/login_check.php" method="post">';
echo '<img class="mb-4" src="assets/ACASTAT_LOGO.png" alt="" width="150" height="150"></img>';
echo '<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>';
echo '<input type="username" id="inputUsername" class="form-control" name="Username" placeholder="User Name" required autofocus>';
echo '<input type="password" id="inputPassword" class="form-control" name="Password" placeholder="Password" required>';
echo '<p style="color:red">';
echo isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
echo '</p>';
echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="Log In" value="Log In" onclick="myFunction()">Log In</button>';
echo '</form>';

echo '<script src="vendor/jquery/jquery.min.js"></script>';
echo '<script src="vendor/bootstrap/js/bootstrap.min.js"></script>';
echo '</body>';
echo '</html>';
?>