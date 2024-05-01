<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--From Bootstrap documentation: Create a new index.html file in your project root. Include the <meta name="viewport"> tag as well for proper responsive behavior in mobile devices.-->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AcaStat</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <?php
    session_start();
    if (!isset($_SESSION["loggedIn"])) {
      include('php/login_check.php');
      shell_exec('php login_check.php');
    }
  ?>
  
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
</head>
<body>

<!-- Framework -->
<header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <img class="mb-4" src="assets/CAP_LOGO.png" alt="" width="5%" height=auto></img>
      <a class="navbar-brand" href="#">AcaStat</a>
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
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
          </li>    
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Courses</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
          </li> 
          <?php
              $con = mysqli_connect('database-1.cs1hkdhivv1o.eu-central-1.rds.amazonaws.com', 'admin', 'JtKRAYtPsXWUU8fYQNdf', 'acastat-database');

              if ($con) {
                $uname = $_SESSION["username"];

                $sql = "SELECT * FROM users INNER JOIN admins WHERE username = '$uname' AND users.userID = admins.userID";

                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) == 1) {
                  echo "<li class='nav-item dropdown'>";
                  echo "<a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Admin Tools</a>";
                  echo "<ul class='dropdown-menu'>";
                  echo "<li><a class='dropdown-item' href='create_user.php'>Create New User</a></li>";
                  echo "<li><a class='dropdown-item' href='create_course.php'>Create New Course</a></li>";
                  echo "</ul>";
                  echo "</li>";
                }
              } 
            ?>    
        </ul>
      </div>
    </div>
  </nav>
</header>

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

<footer>
</footer>
<script src="js/calculator.js"></script>

<!--From Bootstrap documentation: Include Bootstrap’s CSS and JS. Place the <link> tag in the <head> for our CSS, and the <script> tag for our JavaScript bundle (including Popper for positioning dropdowns, poppers, and tooltips) before the closing </body>. Learn more about our CDN links.-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
