<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--From Bootstrap documentation: Create a new index.html file in your project root. Include the <meta name="viewport"> tag as well for proper responsive behavior in mobile devices.-->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AcaStat - Home Page</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <!--Style sheet for icons: https://icons.getbootstrap.com/-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/home.css">

  <?php
    session_start();
    if (!isset($_SESSION["loggedIn"])) {
      include('php/login_check.php');
      shell_exec('php login_check.php');
    }
    
    //connect database
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
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Search Catalogue</a>
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
      <h1 id="banner-text" class="display-4">Welcome back,
      <?php 
        $sql = "SELECT firstName, lastName FROM users WHERE username ='" . $_SESSION['username'] . "'";

        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

          echo $user[0]['firstName'] . " " . $user[0]['lastName'];
      ?>
    </div>
    
    <div class="tool-bar">
      <a class="tool-button" role="button" href="calculator.php">Planner <i class="bi bi-calculator"></i></a>
      <a class="tool-button" role="button" href="planner.php">Calender <i class="bi bi-calendar3"></i></a>
    </div>
  
      <div id="card-div">
        <a href="">
          <div class="card">
            <img src="photos/card-photo-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-university">Winona State University</p>
                <p class="section">Spring 2024</p>
                <p class="card-text">BIO 123: Introduction to Biology</p>
              </div>
          </div>
        </a>

        <a href=""> 
          <div class="card">
            <img src="photos/card-photo-2.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-university">Winona State University</p>
                <p class="section">Spring 2024 </p>
                <p class="card-text">BIO 444: Molecular Biology</p>
              </div>
          </div>
        </a>

        <a href="">
          <div class="card">
            <img src="photos/card-photo-3.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-university">Winona State University</p>
                <p class="section">Spring 2024</p>
                <p class="card-text">SOC 143: Humanities I</p>
              </div>
          </div>
        </a>

        <a href="">
          <div class="card">
            <img src="photos/card-photo-4.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-university">Winona State University</p>
                <p class="section">Spring 2024</p>
                <p class="card-text">PYSC 423: Astrophysics</p>
              </div>
          </div>
        </a>

        <a href="">
          <div class="card">
            <img src="photos/card-photo-5.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-university">Winona State University</p>
                <p class="section">Spring 2024</p>
                <p class="card-text">BIO 123: Introduction to Biology</p>
              </div>
          </div>
        </a>

        <a href="">
          <div class="card">
            <img src="photos/card-photo-6.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-university">Winona State University</p>
                <p class="section">Spring 2024</p>
                <p class="card-text">BIO 444: Molecular Biology</p>
              </div>
          </div>
        </a>
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
