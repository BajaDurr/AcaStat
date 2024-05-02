<?php
session_start();
date_default_timezone_set("America/Chicago");
$subject = $_POST['subject'];
$code = $_POST['code'];
$semester = $_POST['semester'];
$year = $_POST['year'];
$instructor = $_POST['instructor'];

//Database connection

$conn = mysqli_connect('database-1.cs1hkdhivv1o.eu-central-1.rds.amazonaws.com', 'admin', 'JtKRAYtPsXWUU8fYQNdf', 'acastat-database');
if($conn->connect_error) {
    die('Connection Failed : '.$conn->connect_error);
}
else {
    $query = "SELECT * FROM courses INNER JOIN users ON courses.instructorID = users.userID WHERE";
    $result = "";
    $moreThanOne = 0;

    if($_POST['subject'] != null) {
        $query .= " courses.subject='" . $_POST['subject'] . "'";
        $moreThanOne++;
    }
    if($_POST['code'] != null) {
        if($moreThanOne > 0) {
            $query .= " AND";
        }
        $query .= " courses.subject='" . $_POST['code'] . "'" ;
        $moreThanOne++;
    }
    if($_POST['semester'] != null) {
        if($moreThanOne > 0) {
            $query .= " AND";
        }
        $query .= " courses.semester='" . $_POST['semester'] . "'";
        $moreThanOne++;
    }
    if($_POST['year'] != null) {
        if($moreThanOne > 0) {
            $query .= " AND";
        }
        $query .= " courses.year='" . $_POST['year'] . "'";
        $moreThanOne++;
    }
    if($_POST['instructor'] != null) {
        if($moreThanOne > 0) {
            $query .= " AND";
        }
        $query .= " courses.instructor='" . $_POST['instructor'] . "'";
        $moreThanOne++;
    }

    $result = mysqli_query($conn, $query);

    foreach($result as $row) {
        print_r($row);
    }

}
   


?>