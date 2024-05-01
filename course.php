<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--From Bootstrap documentation: Create a new index.html file in your project root. Include the <meta name="viewport"> tag as well for proper responsive behavior in mobile devices.-->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AcaStat</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <!--Style sheet for icons: https://icons.getbootstrap.com/-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/course.css">
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

  <main>
    <!--For icons: https://icons.getbootstrap.com/-->
    <!--For button link: https://stackoverflow.com/questions/36003670/how-to-put-a-link-on-a-button-with-bootstrap-->

    <!--Home Page Banner-->
    <div class="jumbotron" >
      <h1 id="banner-text" class="display-4">Course Title</h1>
    </div>

    <!--Seconday Nav Bar-->
    <div class="tool-bar">
      <button class="tool-button" href="">Material</button>
      <button class="tool-button" href="">Assignments</button>
      <button class="tool-button" href="">Grades</button>
    </div>

    <!--Primary Page Content-->
    <div class="content">

      <!--Left Page Content-->
      <div class="left-hand-content">
        <div id="instructor-card">
          <img id="instructor-photo" src="photos/professor-photo.jpg" >
          <p id="instructor-name">Professor Mittens, MD</p>
          <p id="instructor-text">Hello, all! My name is John Mittens and I am looking forward to professing to you. All questions are welcome.<br><br>johnmittens@winona.edu</p>
        </div>

        <div class="video">
          <div class="video-call">
            <div class="video-call-icon">
              <img src="photos/video-call-icon.png">
            </div>
          </div>
          <button class="call-button" href="">Join Meeting Room</button>
        </div>

        <!--Mini class list-->
          
        <p class="class-list-header">Class List</p>
        <div class="vertical-menu">
          <a href="">Lilian Mejia</a>
          <a href="">Michael Gill</a>
          <a href="">Christina Stout</a>
          <a href="">Thalia McCall</a>
          <a href="">John Doe</a>
          <a href="">Kailani Gregory</a>
          <a href="">Danny Devito</a>
          <a href="">Rory Torres</a>
          <a href="">Anna Giles</a>
          <a href="">Maxton Nolan</a>
          <a href="">Thomas Gordon</a>
        </div>

      </div>

      <div class="center-content">
        <div class="announcements">
          <h1 class="announcement-header" >Announcements</h1>
          
          <div class="post">
            <p id="no-post">There are no posts at this moment. Come back later!</p>
          </div>
        </div>
      </div>

    </div>
  </main>

  <footer>
      <p class="copyright">Copyright 2024-2024 by NiddyGriddy. All Rights Reserved. AcaStat is Powered by yours truly.</p>
  </footer>

  <!--From Bootstrap documentation: Include Bootstrap’s CSS and JS. Place the <link> tag in the <head> for our CSS, and the <script> tag for our JavaScript bundle (including Popper for positioning dropdowns, poppers, and tooltips) before the closing </body>. Learn more about our CDN links.-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
