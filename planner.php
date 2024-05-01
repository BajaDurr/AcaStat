<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AcaStat</title>
    <link rel="icon" type="assets/CAP_LOGO" href="/assets/CAP_LOGO.png">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/calendar.css" rel="stylesheet">

    <?php
        session_start();
        if (!isset($_SESSION["loggedIn"])) {
            include('php/login_check.php');
            shell_exec('php login_check.php');
        }
    ?>
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <img class="mb-4" src="assets/CAP_LOGO.png" alt="" width="5%" height="auto"></img>
                    <a class="navbar-brand" href="home.php">AcaStat</a>
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
                            <?php
                              $con = mysqli_connect('database-1.cs1hkdhivv1o.eu-central-1.rds.amazonaws.com', 'admin', 'JtKRAYtPsXWUU8fYQNdf', 'acastat-database');

                              if ($con) {
                                $uname = $_SESSION["username"];

                                $sql = "SELECT * FROM users INNER JOIN admins WHERE username = '$uname' AND users.userID = admins.userID";

                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) == 1) {
                                  echo "<li class='nav-item dropdown'>";
                                  echo "<a class='nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-expanded='false'>Admin Tools</a>";
                                  echo "<ul class='dropdown-menu'>";
                                  echo "<li><a class='dropdown-item' href='create_user.php'>Create New User</a></li>";
                                  echo "<li><a class='dropdown-item' href='create_course.php'>Create New Course</a></li>";
                                  echo "</ul>";
                                  echo "</li>";
                                }
                              } 
                            ?>   
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="row mt-4">
                <div class="col">
                    <div class="card" id="calendar-tab">
                        <div class="card-body">
                            <h5 class="card-title" id="month-year"></h5>
                            <!-- Include navigation buttons for previous month and next month -->
                            <div class="text-center mb-3">
                                <button id="prev-month-button" class="btn btn-primary me-2">&lt; Previous Month</button>
                                <button id="next-month-button" class="btn btn-primary">&gt; Next Month</button>
                            </div>
                            <!-- Calendar Content -->
                            <table class="table table-bordered" id="calendar-body">
                                <thead>
                                    <tr>
                                        <th scope="col">Sun</th>
                                        <th scope="col">Mon</th>
                                        <th scope="col">Tue</th>
                                        <th scope="col">Wed</th>
                                        <th scope="col">Thu</th>
                                        <th scope="col">Fri</th>
                                        <th scope="col">Sat</th>
                                    </tr>
                                </thead>
                                <tbody id="calendar-dates">
                                    <!-- Calendar days will be generated here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" id="agenda-tab">
                        <h3>Agenda</h3>
                        <div id="selected-date-info"></div>
                        <ul id="agenda-list"></ul>
                        <button id="add-event-button" style="display: none;">Add Event</button>
                    </div>
                    
                    <div class="card mt-4" id="upcoming-tab">
                        <h3>Upcoming Events</h3>
                        <div id="upcoming-events"></div>
                        <ul id="upcoming-list"></ul>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/calendar.js"></script>
</body>
</html>
