<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AcaStat</title>
  <link rel="icon" type="assets/CAP_LOGO" href="/assets/CAP_LOGO.png">
  
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  
  <link href="css/submission.css" rel="stylesheet" />

<?php
    session_start();
    if (!isset($_SESSION["loggedIn"])) {
      include('php/login_check.php');
      shell_exec('php login_check.php');
    }
  ?>

</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <img class="mb-4" src="assets/CAP_LOGO.png" alt="" width="5%" height=auto />
        <a class="navbar-brand" href="home.php">AcaStat</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Institution</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
              </ul>
            </li>    
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Courses</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
              </ul>
            </li>     
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container mt-5">
    <!-- Assignment Details Section -->
    <section class="assignment-details mb-5">
      <h2>Assignment Details</h2>
      <div id="assignmentInfo" class="assignment-info">
        <p><strong>Assignment Title:</strong> <span id="assignmentTitle"></span></p>
        <p><strong>Deadline:</strong> <span id="assignmentDeadline"></span></p>
        <p><strong>Description:</strong> <span id="assignmentDescription"></span></p>
      </div>
    </section>

    <!-- File Submission Section -->
    <section class="file-submission">
      <h2>Submit Your Work</h2>
      <form id="assignmentForm" action="php/submit_assignment.php" method="post" onsubmit="return validateForm()">
        <!-- <input type="hidden" name ="MAX FILE SIZE" value = "1073741824"> -->
        <div class="mb-3">
          <label for="myfile" class="form-label">Upload File:</label>
          <input type="file" class="form-control" id="myfile" name="myfile" accept=".pdf,.doc,.docx, .ZIP, .txt" onchange="enableSubmitButton()" />
          <small id="fileHelp" class="form-text text-muted">Accepted file formats: PDF, DOC, DOCX, ZIP, txt</small>
        </div>
        <div class="mb-3">
          <label for="notes" class="form-label">Notes:</label>
          <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Add any additional notes or comments"></textarea>
        </div>
        <button type="submit" id="submitBtn" class="btn btn-primary" disabled>Submit Assignment</button>
      </form>
    </section>
  </main>

  <footer class="footer mt-5">
 
  </footer>
  
  <!-- Bootstrap JavaScript Bundle with Popper -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Custom JavaScript for dynamic assignment details and form validation -->
  <script>
    // Simulated assignment data (can be retrieved from a database or API)
    var assignmentData = {
      title: "Statistics Project",
      deadline: "May 15, 2024",
      description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula justo id justo consectetur, at posuere velit efficitur. Nullam euismod mauris ac fermentum mollis."
    };

    // Function to populate assignment details
    function populateAssignmentDetails() {
      document.getElementById('assignmentTitle').textContent = assignmentData.title;
      document.getElementById('assignmentDeadline').textContent = assignmentData.deadline;
      document.getElementById('assignmentDescription').textContent = assignmentData.description;
    }

    // Function to enable/disable submit button based on file selection
    function enableSubmitButton() {
      var fileInput = document.getElementById('myfile');
      var submitButton = document.getElementById('submitBtn');

      if (fileInput && fileInput.files.length > 0) {
        submitButton.disabled = false;
      } else {
        submitButton.disabled = true;
      }
    }

    // Function to validate form submission
    function validateForm() {
      var fileInput = document.getElementById('myfile');

      if (fileInput && fileInput.files.length === 0) {
        alert('Please select a file to upload.');
        return false;
      }

      return true; // Form will submit if file is selected
    }

    // Populate assignment details when the page loads
    window.onload = function() {
      populateAssignmentDetails();
    };
  </script>
</body>
</html>