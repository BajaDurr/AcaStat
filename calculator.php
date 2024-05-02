<!DOCTYPE html>
<html lang="en">
<head><?php include "php/head.php"; exec("php php/head.php");?></head>
<body>
  <header><?php include "php/navbar.php"; exec("php php/navbar.php");?></header>

   <!-- CSS styles -->
  <style>
    .grades-box {
      border: 2px solid black;
      border-radius: 10px;
      padding: 20px;
      margin-top: 20px;
      margin-bottom: 200px;
      height: 100%;
    }
    .grades-header {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
      border-bottom: 1px solid black;
      padding-bottom: 10px;
      text-align: center;
    }
    .ui-box {
      border: 2px solid black;
      border-radius: 10px;
      padding: 20px;
      margin-top: 20px;
    }
    .header {
    background-color: indianred;
    color: white;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    text-align: center;
    }
    .input-group {
      margin-bottom: 10px;
      text-align: left;
    }
    .input-group label {
      display: block;
      margin-bottom: 5px;
    }
    .input-group input[type="text"],
    .input-group select {
      width: calc(100% - 24px);
      padding: 8px;
      box-sizing: border-box;
    }
    .answer-box {
      border: 2px solid black;
      border-radius: 5px;
      padding: 10px;
      margin-top: 20px;
      text-align: left;
    }
    .button-group {
      margin-top: 20px;
      text-align: center;
    }
    .button-group button {
      padding: 10px 20px;
      margin: 0 10px;
      cursor: pointer;
    }
    main.container {
      margin-top: 50px;
    }
  </style>

<!-- Added classes -->
<main class="container">
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
          <button id="clear-button">Clear</button>
          <button id="calculate-button">Calculate</button>
        </div>
      </div>
    </div>
  </div>
</main>


<script src="js/calculator.js"></script>
<footer class="mt-5 text-center"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>
</body>
</html>
