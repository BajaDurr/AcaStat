<!DOCTYPE html>
<html lang="en">
<head><?php include "php/head.php"; exec("php php/head.php");?></head>
<body>
  <header><?php include "php/navbar.php"; exec("php php/navbar.php");?></header>

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

  <footer class="mt-5 text-center"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>
</body>
</html>