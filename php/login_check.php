<?php
session_start();
date_default_timezone_set("America/Chicago");

$uname_error = $pass_error = "";
echo "something";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the fields are not empty
    if (!empty($_POST['Username']) && !empty($_POST['Password'])) {
        $con = mysqli_connect('database-1.cs1hkdhivv1o.eu-central-1.rds.amazonaws.com', 'admin', 'JtKRAYtPsXWUU8fYQNdf', 'acastat-database');

        if ($con) {
            $uname = mysqli_real_escape_string($con, $_POST['Username']);
            $pass = mysqli_real_escape_string($con, $_POST['Password']);
            $sql = "SELECT Username, Password FROM admins WHERE Username = '$uname' AND Password = '$pass'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) == 1) {
                // Username and password are correct
                header("location: ../home.html");
                exit();
            } else {
                // Incorrect username or password
                $error = "Invalid username or password";
                header('location: ../login.php?error=' . urlencode($error));
                exit;
            }
        } else {
            $error = "Unable to establish database connection.";
            header('location: ../login.php?error=' . urlencode($error));
            exit; 
        }
    } //username and password are required by HTML, no need for else case
}
mysqli_close($con);
?>