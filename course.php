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

  <footer class="mt-5 text-center"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>

</body>
</html>
