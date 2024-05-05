<!DOCTYPE html>
<html lang="en">
<head><?php include "php/head.php"; exec("php php/head.php");?></head>
<body>
  <header><?php include "php/navbar.php"; exec("php php/navbar.php");?></header>

  <main class="container-fluid">
    <link rel="stylesheet" href="css/course.css"/>
    <style>#prevent-select {-webkit-user-select: none; /* Safari */-ms-user-select: none; /* IE 10 and IE 11 */user-select: none; /* Standard syntax */}</style>
    <!--For icons: https://icons.getbootstrap.com/-->
    <!--For button link: https://stackoverflow.com/questions/36003670/how-to-put-a-link-on-a-button-with-bootstrap-->

    <?php
      //Get course information
    $query = "SELECT userID FROM users WHERE username = '" . $_SESSION["username"] . "'";
    $return = mysqli_query($conn, $query);
    $return = $return -> fetch_all(MYSQLI_ASSOC);
    $_SESSION["userID"] = $return[0]['userID'];

    $query = "SELECT * FROM users NATURAL JOIN (SELECT * FROM courses WHERE courseID = ". $_GET['courseID'] ." ) as myCourse WHERE users.userID = myCourse.instructorID";
      $return = mysqli_query($conn, $query);
      $return = $return -> fetch_all(MYSQLI_ASSOC);
      $return = $return[0];
      ?>
      <!--Home Page Banner-->
      
      <div class="jumbotron" ><?php echo "<h1 id='banner-text' class='display-4'>" . $return["courseTitle"] . "</h1>"?></div>

      <!--Seconday Nav Bar-->
      <div id="prevent-select" class="tool-bar">
        <style>a{text-decoration:none;}</style>
        <?php

        //check if instructor for current course
        $query = "SELECT userID FROM instructors INNER JOIN courses WHERE " . $userID . " = courses.instructorID  AND courses.courseID = " . $_GET['courseID'];

        $check = mysqli_query($conn, $query);
        $check = $check -> fetch_all(MYSQLI_ASSOC);

        if (count($check) == 0) {$identifier = "_student";} else {$identifier = "_instructor";}

        echo "<a class='tool-button' href='material" . $identifier . ".php?user=" . $_SESSION["username"] . "&courseID=". $_GET["courseID"] . "'>Material</a>";
        
        echo "<a class='tool-button' href='course_assignments" . $identifier . ".php?user=" . $_SESSION["username"] . "&courseID=". $_GET["courseID"] . "'>Assignments</a>";

        ?>
        <a class="tool-button" href="calculator.php">Grades/Calculator</a>
        <a class="tool-button" href="planner.php">Planner</a>
      </div>
      
      <br>

      <!--Primary Page Content-->
      <div id="prevent-select" class="row justify-content-md-center">

        <!--Left Page Content-->
        <?php
        echo "<div class='col col-md-3'>
        <div id='instructor-card'>
        <img id='instructor-photo' class='img-fluid' src='photos/professor-photo.jpg' >
        <p id='instructor-name'>" . $return["firstName"] . " " . $return["lastName"]  . "</p>
        <p id='instructor-text'>Hello, all! I am looking forward to professing to you. All questions are welcome.<br><br>" . $return["email"] . "</p>
        </div>"
        ?>

        <div class="video">
          <div class="video-call">
            <div class="video-call-icon">
              <img class='img-fluid' src="photos/video-call-icon.png">
            </div>
          </div>
          <button role="button" class="btn call-button" href="">Join Meeting Room</button>
        </div>

        <!--Mini class list-->
        
        <?php
            //Get classlist information
        $queryclasslist = "SELECT DISTINCT firstName, lastName FROM takes NATURAL JOIN users";
        $returnclasslist = mysqli_query($conn, $queryclasslist);
        $returnclasslist = $returnclasslist -> fetch_all(MYSQLI_ASSOC);
        echo "<p class='class-list-header'>Class List</p>
        <div class='vertical-menu'>";
        foreach($returnclasslist as $row) {echo "<a href=''>" . $row["firstName"] . " " . $row["lastName"] . "</a>";}
        echo "</div>";
        ?>

      </div>

      <div class="col col-md-7">
        <div class= "announcements">
          <h1 class="announcement-header" >Announcements<br>
          <a type="button" class="btn btn-success" href="create_announcement.php">Create Announcement <i class="bi bi-plus"></i></a>
          </h1>
          <div class="post">
            <p id="no-post">There are no posts at this moment. Come back later!</p>
          </div>

        </div>
      </div>

    </div>
    <br>
  </main>

  <footer class="footer"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>

</body>
</html>
