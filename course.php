<!DOCTYPE html>
<html lang="en">
<head><?php include "php/head.php"; exec("php php/head.php");?></head>
<body>
  <header><?php include "php/navbar.php"; exec("php php/navbar.php");?></header>

  <main class="container-fluid">
    <link rel="stylesheet" href="css/course.css"/>
    <!--For icons: https://icons.getbootstrap.com/-->
    <!--For button link: https://stackoverflow.com/questions/36003670/how-to-put-a-link-on-a-button-with-bootstrap-->

    <?php
      //Get course information
      $query = "SELECT userID FROM users WHERE username = '" . $_SESSION["username"] . "'";
      $return = mysqli_query($conn, $query);
      $return = $return -> fetch_all(MYSQLI_ASSOC);
      $userID = $return[0]['userID'];

      $query = "SELECT * FROM users NATURAL JOIN (SELECT * FROM courses WHERE courseID = '" . $_GET['courseID'] . "') as myCourse WHERE users.userID = myCourse.instructorID";
      $return = mysqli_query($conn, $query);
      $return = $return -> fetch_all(MYSQLI_ASSOC);
      $return = $return[0];
    ?>
    <!--Home Page Banner-->
    
    <div class="jumbotron" >
      <?php
        echo "<h1 id='banner-text' class='display-4'>" . $return["courseTitle"] . "</h1>"
      ?>
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
      <?php
      echo "<div class='left-hand-content'>
        <div id='instructor-card'>
          <img id='instructor-photo' src='photos/professor-photo.jpg' >
          <p id='instructor-name'>" . $return["firstName"] . " " . $return["lastName"]  . "</p>
          <p id='instructor-text'>Hello, all! I am looking forward to professing to you. All questions are welcome.<br><br>" . $return["email"] . "</p>
        </div>"
      ?>

        <div class="video">
          <div class="video-call">
            <div class="video-call-icon">
              <img src="photos/video-call-icon.png">
            </div>
          </div>
          <button class="call-button" href="">Join Meeting Room</button>
        </div>

        <!--Mini class list-->
        
        <?php
            //Get classlist information
          $queryclasslist = "SELECT DISTINCT firstName, lastName FROM takes NATURAL JOIN users";
          $returnclasslist = mysqli_query($conn, $queryclasslist);
          $returnclasslist = $returnclasslist -> fetch_all(MYSQLI_ASSOC);
          echo "<p class='class-list-header'>Class List</p>
                  <div class='vertical-menu'>";
          foreach($returnclasslist as $row) {
            echo "<a href=''>" . $row["firstName"] . " " . $row["lastName"] . "</a>";
          }
          echo "</div>";
            
        ?>

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

  <footer class="mt-5 text-center"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>

</body>
</html>
