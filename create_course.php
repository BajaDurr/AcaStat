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
    $conn = mysqli_connect('database-1.cs1hkdhivv1o.eu-central-1.rds.amazonaws.com', 'admin', 'JtKRAYtPsXWUU8fYQNdf', 'acastat-database');
    if($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    }
  ?>
</head>
<body>

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
              <a class="nav-link active" aria-current="page" href="home.html">Home</a>
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

  <main class="container-fluid">
    

    <form class="needs-validation" action="php/create-course-handler.php" method="post" novalidate>

      <h1 class = "text-center">Create New Course</h1>


      <hr></hr>

      <div class="row justify-content-center">

        <div class="col-sm-2">
          <label for="validationTooltip01">Course Title</label>
          <input type="text" class="form-control" id="validationTooltip01" placeholder="ex. Chemistry I" name="courseTitle" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-sm-2">
          <label for="state" class="col-sm-2 control-label">Subject</label>
          <select class="form-control" id="subject" name="subject">
            <option value="">N/A</option>
            <option value="ACCT">Accounting</option>
            <option value="ARTS">Art</option>
            <option value="BIOL">Biology</option>
            <option value="CHEM">Chemistry</option>
            <option value="COMM">Communication</option>
            <option value="COMP">Computer Science</option>
            <option value="ECON">Economics</option>
            <option value="ENGL">English</option>
            <option value="GEOG">Geograhy</option>
            <option value="HIST">History</option>
            <option value="MATH">Math</option>
            <option value="MUSC">Msuic</option>
            <option value="PHYS">Physics</option>
            <option value="PSYC">Physcology</option>
            <option value="SOCI">Sociology</option>
          </select>
        </div>

        <div class="col-sm-2">
          <label for="validationTooltip08">Course Code</label>
          <input type="text" class="form-control" id="validationTooltip08" placeholder="ex. 244" name="code" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>


  
      </div>

      <hr></hr>
      

      <div class="row justify-content-center">

        <div class="col-sm-2">
          <label for="state" class="col-sm-2 control-label">Semester</label>
          <select class="form-control" id="semester" name="semester">
            <option value="">N/A</option>
            <option value="Fall">Fall</option>
            <option value="Spring">Spring</option>
            <option value="Summer">Summer</option>
          </select>
        </div>

        <div class="col-sm-2">
          <label for="state" class="col-sm-2 control-label">Year</label>
          <select class="form-control" id="year" name="year">
            <option value="">N/A</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
          </select>
        </div>

        <div class="col-sm-2">
          <label for="state" class="col-sm-2 control-label">Instructor</label>
          <select class="form-control" id="instructor" name="instructor">
            <option value="">N/A</option>
            <?php
                $sql = "SELECT firstName, lastName, instructors.userID FROM instructors INNER JOIN users ON users.userID = instructors.userID ORDER BY lastName";

                $result = mysqli_query($conn, $sql);

                $instructors = mysqli_fetch_all($result, MYSQLI_ASSOC);

                foreach($instructors as $row) {
                  echo "<option value='" . $row["userID"] . "'>" . $row["lastName"] . ", " . $row["firstName"] . "</option>";
                } 
              ?>
          </select>
        </div>


      </div>

      <hr></hr>

      

      </div>

    
      
      <div class="text-center">
        <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
    </form>
  </main>

  <footer>
  </footer>
  
  <!--From Bootstrap documentation: Include Bootstrap’s CSS and JS. Place the <link> tag in the <head> for our CSS, and the <script> tag for our JavaScript bundle (including Popper for positioning dropdowns, poppers, and tooltips) before the closing </body>. Learn more about our CDN links.-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>