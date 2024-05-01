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
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container-fluid">
    

    <form class="needs-validation" action="php/create-assignment-handler.php" method="post" enctype="multipart/form-data"  novalidate>

      <h1 class = "text-center">Create Assignment</h1>


      <hr></hr>

      <div class="row justify-content-center">
        <div class="col-sm-2">
          <label for="validationTooltip01">Assignment Title</label>
          <input type="text" class="form-control" id="validationTooltip01" placeholder="ex. Homework 1" name="title" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-sm-2">
            <label for="start">Due Date:</label>
            <?php
                $aYearFromNow = date_format(date_add(date_create(date("Y-m-d")),date_interval_create_from_date_string("365 days")), "Y/m/d");
                
                echo "<input type='date' class='form-control' id='dueDate' name='dueDate' value='" . date("Y-m-d") . "'  min='" . date("Y-m-d") . "' max='" . $aYearFromNow . "' />";
            ?>
        </div>


      <hr></hr>

      <div class="row justify-content-center">
        <section class="file-submission">
        <h2>Attach Assignment</h2>
            <!-- <input type="hidden" name ="MAX FILE SIZE" value = "1073741824"> -->
            <div class="mb-3">
                <label for="myfile" class="form-label">Upload File:</label>
                <input type="file" class="form-control" id="file" name="myFile">
                <small id="fileHelp" class="form-text text-muted">Accepted file formats: PDF, DOC, DOCX, ZIP, txt</small>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes:</label>
                <textarea class="form-control" id="notes" name="notes" rows="4" placeholder="Add any additional notes or comments"></textarea>
            </div>
        </section>
      </div>
      
      <div class="text-center">
        <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
    </form>
  </main>

  <footer>
  </footer>
  
  <!--From Bootstrap documentation: Include Bootstrap’s CSS and JS. Place the <link> tag in the <head> for our CSS, and the <script> tag for our JavaScript bundle (including Popper for positioning dropdowns, poppers, and tooltips) before the closing </body>. Learn more about our CDN links.-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>