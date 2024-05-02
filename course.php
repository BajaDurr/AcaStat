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
    url("../photos/course-banner.jpg");
    background-position: center;
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

.content {
    display: flex;
    width: 90%;
    margin: auto;
    margin-top: 2em;
}

#banner-text {
    font-weight: 600;
}

#instructor-card {
    padding-bottom: 2em;
    margin-bottom: 2em;
    border-bottom: solid;
    border-color: rgb(218, 217, 217);
    border-width: 2px;
}
#instructor-photo {
    width: 25em;
    height: 25em;
    object-fit: cover;
    border-radius: 2em;
}

#instructor-name, #instructor-text {
    padding: .5em;
    margin: 0px;
    font-size:xx-large;
    font-weight: 700;
    color:rgb(66, 66, 66)
}

#instructor-text {
    font-size:medium;
    color: gray;
    border-bottom: 2px;
    border-color: black;
}

.left-hand-content {
    width: 25em;
    margin-right: 3em;
}

/* ------------- Scrollable List CSS------------------*/

.class-list-header {
    margin-right: 1em;
    color:rgb(95, 95, 95);
    padding: 0em 1em .5em 1em;
    font-weight: 700;
    font-size: x-large;
}

.vertical-menu {
    width: 25em;
    height: 15em;
    overflow-y: auto;
    border-radius: 2em;
    margin-bottom: 3em;
    background-color: #eeee;
    padding:1em;

}

.vertical-menu a {
    color: rgb(138, 138, 138);
    display: block;
    padding: .3em;
    padding-left: 1em;
    text-decoration: none;
    font-size: large;
    font-weight: 700;
    align-items: center;
}

.video {
    border-bottom: solid;
    border-color: rgb(218, 217, 217);
    border-width: 2px;
    margin-bottom: 2em;
}

.video-call {
    display: flex;
    width: 25em;
    height:15em;
    background-image: url("../photos/video-call-background.jpg");
    background-size:cover;
    border-radius: 2em;
    justify-content: center;
    align-items: center;
    margin-bottom: 1em;
}


.video-call-icon img {
    object-fit: cover;
    width: 10em;
    height:10em;
}

.call-button {
    width: 25em;
    height: 5em; 
    border-style: solid;
    border-width: 1px;
    background-image: linear-gradient(135deg, rgb(122, 219, 122), rgb(87, 185, 120));
    border-radius: 1.5em;
    color:rgb(255, 255, 255);
    font-weight: 600;
    font-size: medium;
    margin-bottom:3em;
}


.center-content {
    width: 100%;
    padding-left: 5em;
    padding-right: 5em;
}
.announcement-header {
    width: 100%;
    font-size: 5em;
    font-weight: 600;
    color: rgb(66, 66, 66);
    border-bottom: solid;
    border-color: rgb(218, 217, 217);
    border-width: 2px;
    text-align: center;
    padding-bottom: .5em;
    margin-bottom: 2em;
}

#no-post {
    text-align: center;
    font-size: 2em;
    color: rgb(141, 141, 141);
}

  </style>
</head>
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
