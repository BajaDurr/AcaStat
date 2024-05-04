<!DOCTYPE html>
<html lang="en">
<head><?php include "php/head.php"; exec("php php/head.php");?></head>
<body>
  <header><?php include "php/navbar.php"; exec("php php/navbar.php");?></header>

  <link rel="stylesheet" href="css/calculator.css"/> 

  <!-- Added classes -->
  <main class="container-fluid">
    <div class="row">
      <div class="col-md-5">
        <div class="grades-box">
          <div class="grades-header">Grades</div>
        </div>
      </div>
      <div class="col-md-7">
        <div class="ui-box">
          <div class="header">Final Grade Calculator</div>
          <div class="input-group">
            <label for="find">Find:</label>
            <select id="find" onchange="changeOptions()">
              <option value="final-exam">Final Exam Grade I Need</option> 
              <option value="final-class">Final Class Grade</option> 
            </select>
          </div>
          <div class="input-group">
            <label id="first-option-label" for="first-option">Current Grade:</label>
            <input type="text" id="first-option" placeholder="Enter current grade">
            <span>%</span>
          </div>
          <div class="input-group">
            <label id="second-option-label" for="second-option">Desired Grade:</label>
            <input type="text" id="second-option" placeholder="Enter grade">
            <span>%</span>
          </div>
          <div class="input-group">
            <label id="third-option-label" for="third-option">Final Exam Weight:</label>
            <input type="text" id="third-option" placeholder="Enter exam weight">
            <span>%</span>
          </div>
          <div class="answer-box" id="answer-box">Answer: </div>
          <div class="button-group">
            <button id="clear-button" class="btn btn-primary">Clear</button>
            <button id="calculate-button" class="btn btn-primary">Calculate</button>
          </div>
        </div>
      </div>
    </div>
  </main>


  <script src="js/calculator.js"></script>
  <footer class="mt-5 text-center"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>
</body>
</html>
