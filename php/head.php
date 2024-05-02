<?php
echo '<meta charset="utf-8" />';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge" />';
echo '<!--From Bootstrap documentation: Create a new index.html file in your project root. Include the <meta name="viewport"> tag as well for proper responsive behavior in mobile devices.-->';
echo '<meta name="viewport" content="width=device-width, initial-scale=1" />';
echo '<title>AcaStat</title>';
echo '<link rel = "icon" type= "assets/CAP_LOGO.png" href=/assets/CAP_LOGO.png>';
echo '<!-- Bootstrap core CSS -->';
echo '<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css"/>';
session_start();
if (!isset($_SESSION["loggedIn"])) { include("php/login_check.php"); shell_exec("php login_check.php");}
$conn = mysqli_connect("database-1.cs1hkdhivv1o.eu-central-1.rds.amazonaws.com", "admin", "JtKRAYtPsXWUU8fYQNdf", "acastat-database");
if($conn->connect_error) {die("Connection Failed : ".$conn->connect_error);}
?>