<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "php/head.php"; exec("php php/head.php");?>
  <link rel="stylesheet" href="css/home.css">
</head>
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


        <?php

          //change username to userID
          $query = "SELECT userID FROM users WHERE username = '" . $_SESSION["username"] . "'";
          $return = mysqli_query($conn, $query);
          $return = $return -> fetch_all(MYSQLI_ASSOC);
          $userID = $return[0]['userID'];

          $query = "SELECT * FROM users NATURAL JOIN takes NATURAL JOIN courses WHERE userID = '" . $userID . "'";
          $return = mysqli_query($conn, $query);
          $return = $return -> fetch_all(MYSQLI_ASSOC);
                  
          foreach($return as $row) {
            echo
            "<a href='course.php?user=" . $_SESSION["username"] . "&courseID=". $row["courseID"] . "'>
              <div class='card'>
                <img src='photos/card-photo-1.jpg' class='card-img-top' alt='...'>
                <div class='card-body'>
                  <p class='card-university'>Winona State University</p>
                  <p class='section'>" . $row['semester'] . " " . $row['year'] . "</p>
                  <p class='card-text'>" . $row['subject'] . " " . $row['courseCode'] . ": " . $row['courseTitle'] . "</p>
                </div>
              </div>
            </a>";
          }
      
        ?>
        
      </div>
    </main>
    <footer class="mt-5 text-center"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>
  </body>
  </html>
