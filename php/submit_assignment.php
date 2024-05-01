<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded successfully
    if (isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] == UPLOAD_ERR_OK) {
        $uploadDir = "uploads/"; // Directory where uploaded files will be stored
        $uploadFile = $uploadDir . basename($_FILES["myfile"]["name"]);

        // Move uploaded file to specified directory
        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $uploadFile)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }

        // Additional processing (e.g., save file path to database, process form data)
        $notes = $_POST["notes"]; // Retrieve additional form data (notes)
        // Perform further processing as needed (e.g., save to database)
    } else {
        echo "Error: No file uploaded.";
    }
} else {
    echo "Invalid request method.";
}

// Example: Save file path and form data to database
// Assume you have a database connection established
$filePath = $uploadFile; // File path saved during upload
$assignmentId = 123; // Example assignment ID (replace with actual ID)
$notes = $_POST["notes"]; // Additional form data (notes)

// Insert into database (example using PDO)
try {
    $pdo = new PDO("mysql:host=localhost;dbname=mydatabase", "username", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO submissions (assignment_id, file_path, notes) VALUES (?, ?, ?)");
    $stmt->execute([$assignmentId, $filePath, $notes]);

    echo "Submission recorded successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>
