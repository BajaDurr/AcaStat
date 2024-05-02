<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "php/head.php"; exec("php php/head.php");?>
  <style>
    html, body {
    padding:0;
    margin:0; 
    height:100%;
}

footer{
    position: relative; 
    bottom: 0; 
    left: 0; 
    right: 0;
    background-color: rgb(201, 201, 201);
    color:gray;
    text-align: center;
    padding: 2em;
}

.jumbotron {
    background-color: rgb(196, 196, 196);
    background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.171), rgb(77, 77, 77)),
    url("../photos/home-banner.jpg");
    background-position: bottom center;
    background-size: cover;
    color: white;
    margin:auto;
    margin-top: 2em;
    padding-left: 3em;
    padding-top: 23em;
    height: 30em;
    width: 90%;
    border-radius: 20px;
}

#banner-text {
    font-weight: 600;
}

.tool-bar {
    display: block;
    width: 90%;
    margin:auto;
    margin-top: 2em;
    padding-left: 1em;
    padding-bottom: 2em;
    border-bottom: solid;
    border-color: rgb(218, 217, 217);
    border-width: 2px;

}

.tool-button {
    margin-right: 1em;
    border-style: solid;
    border-width: 1px;
    border-color: rgb(224, 224, 224);
    border-radius: .75em;
    color:rgb(95, 95, 95);
    padding: .5em 1em .5em 1em;
    font-weight: 700;
    font-size: x-large;
}

#card-div {
    width: 90%;
    margin: auto;
    margin-top: 2em;
    margin-bottom: 2em;
    padding: auto;
    
}

.card {
    width: 25em;
    height: 28em;
    vertical-align: top;
    display: inline-block;
    background-color: rgb(255, 255, 255);
    border-style: none;
    border-radius: 20px 20px 0px 0px;
    margin: 10px;
    border-bottom: solid;
    border-color: rgb(218, 217, 217);
    border-width: 2px;
}

.card-img-top {
    object-fit: cover;
    border-style: solid;
    border-color: rgb(211, 211, 211);
    border-width: 1px;
    border-radius: 20px; 
    height: 60%;
}

.card-university, .section {
    padding: 0px;
    margin: 0px;
    font-size:medium;
    font-weight: 600;
    color: rgb(151, 151, 151);
}

.card-text {
    padding: 0px;
    margin: 0px;
    font-size:x-large;
    font-weight: 700;
    color:rgb(66, 66, 66)
}


  </style>
</head>
<body>
  <header><?php include "php/navbar.php"; exec("php php/navbar.php");?></header>

  <main class = "container-fluid">
    <link rel="stylesheet" href="css/home.css"/>
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
        <a class="tool-button" role="button" href="planner.php">Calendar <i class="bi bi-calendar3"></i></a>
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
