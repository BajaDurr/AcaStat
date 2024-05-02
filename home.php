<!DOCTYPE html>
<html lang="en">
<head><?php include "php/head.php"; exec("php php/head.php");?></head>
<body>
  <header><?php include "php/navbar.php"; exec("php php/navbar.php");?></header>

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
  <footer class="mt-5 text-center"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>
</body>
</html>
