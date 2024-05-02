<?php
$myfile = $_POST['myfile'];
$notes = $_POST['notes'];

    //Database Connection
$conn = mysqli_connect('database-1.cs1hkdhivv1o.eu-central-1.rds.amazonaws.com', 'admin', 'JtKRAYtPsXWUU8fYQNdf', 'acastat-database');
if($conn->connect_error) {
    die('Connection Failed : ' .$conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO submissions(myfile, notes)
        values(?, ?)");
    $stmt->bind_param("bs", $myfile, $notes);
    $stmt->execute();
    echo "Assignment Submission Successful";
    $stmt->close();
    $conn->close();
}
?>