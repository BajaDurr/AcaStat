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
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container-fluid">
    

    <form class="needs-validation" action="php/create-user-handler.php" method="post" novalidate>

      <h1 class = "text-center">Create New User</h1>

      <div class = "text-center"> 
        <h5 class = "text-center">Select a type of user to create:</h5>
        
        <input type="radio" class="btn-check" name="options-outlined" id="option1" value="student" autocomplete="off" checked>
        <label class="btn btn-outline-primary" for="option1">Student</label>

        <input type="radio" class="btn-check" name="options-outlined" id="option2" value="instructor" autocomplete="off">
        <label class="btn btn-outline-primary" for="option2">Instructor</label>

        <input type="radio" class="btn-check" name="options-outlined" id="option3" value="admin" autocomplete="off">
        <label class="btn btn-outline-primary" for="option3">Admin</label>
      </div>

    <div class = "text-center"> 
      
      <input type="radio" class="form-check-input" name="exampleRadios" id="option1" autocomplete="off" checked>
      <label class="form-check-label" for="option1">One</label>

      <input type="radio" class="form-check-input" name="exampleRadios" id="option2" autocomplete="off">
      <label class="form-check-label" for="option2">Many</label>
    </div>

    <hr></hr>

      <div class="row justify-content-center">

        <div class="col-sm-2">
          <label for="validationTooltip01">First name</label>
          <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" name="firstName" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-sm-2">
          <label for="validationTooltip02">Last name</label>
          <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" name="lastName" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-sm-2">
          <label for="validationTooltip08">Phone</label>
          <input type="text" class="form-control" id="validationTooltip08" placeholder="Phone" name="phone" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>

        <div class="col-sm-2">
          <label for="validationTooltip09">Email</label>
          <input type="text" class="form-control" id="validationTooltip09" placeholder="Email" name="email" required>
          <div class="valid-tooltip">
            Looks good!
          </div>
        </div>
        
      </div>

      <hr></hr>

      <div class="row justify-content-center">

        <div class="col-sm-2">
          <label for="validationTooltipUsername">Username</label>
          <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" name="username">
          <div class="invalid-tooltip">
            Please choose a unique and valid username.
          </div>
        </div>

        <div class="col-sm-2">
          <label for="validationTooltipPassword">Password</label>
          <input type="text" class="form-control" id="validationTooltipPassword" placeholder="Password" name="password" required>
          <div class="invalid-tooltip">
            Please choose a unique and valid password.
          </div>
        </div>

      </div>

      <hr></hr>

      <div class="row justify-content-center">

        <div class="col-sm-3">
          <label for="validationTooltip06">Address</label>
          <input type="text" class="form-control" id="validationTooltip06" placeholder="Address" name="address" required>
          <div class="invalid-tooltip">
            Please provide a valid address.
          </div>
        </div>

        <div class="col-sm-1">
          <label for="validationTooltip07">Apartment/suite/etc.</label>
          <input type="text" class="form-control" id="validationTooltip07" placeholder="Apartment/suite/etc." name="apartment" required>
          <div class="invalid-tooltip">
            Please provide a valid address.
          </div>
        </div>

      </div>

      <div class="row justify-content-center">

        <div class="col-sm-2">
          <label for="validationTooltip03">City</label>
          <input type="text" class="form-control" id="validationTooltip03" placeholder="City" name="city" required>
          <div class="invalid-tooltip">
            Please provide a valid city.
          </div>
        </div>

        <!--https://gist.github.com/RichLogan/9903043-->
        <div class="col-sm-2">
          <label for="state" class="col-sm-2 control-label">State</label>
          <select class="form-control" id="state" name="state">
            <option value="">N/A</option>
            <option value="AK">Alaska</option>
            <option value="AL">Alabama</option>
            <option value="AR">Arkansas</option>
            <option value="AZ">Arizona</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DC">District of Columbia</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="IA">Iowa</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="MA">Massachusetts</option>
            <option value="MD">Maryland</option>
            <option value="ME">Maine</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MO">Missouri</option>
            <option value="MS">Mississippi</option>
            <option value="MT">Montana</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="NE">Nebraska</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NV">Nevada</option>
            <option value="NY">New York</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="PR">Puerto Rico</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VA">Virginia</option>
            <option value="VT">Vermont</option>
            <option value="WA">Washington</option>
            <option value="WI">Wisconsin</option>
            <option value="WV">West Virginia</option>
            <option value="WY">Wyoming</option>
          </select>
        </div>

        <div class="col-sm-1">
          <label for="validationTooltip05">Zip</label>
          <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" name="zipCode"required>
          <div class="invalid-tooltip">
            Please provide a valid zip.
          </div>
        </div>
      </div>

      <hr></hr>
      
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