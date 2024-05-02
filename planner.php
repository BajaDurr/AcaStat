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
                                // Database connection parameters
                                $hostname = 'database-1.cs1hkdhivv1o.eu-central-1.rds.amazonaws.com';
                                $username = 'admin';
                                $password = 'JtKRAYtPsXWUU8fYQNdf';
                                $database = 'acastat-database';

                                // Connect to the database
                                $con = mysqli_connect($hostname, $username, $password, $database);

                                // Check connection
                                if (mysqli_connect_errno()) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                // Query to select assignmentID, title, and dueDate from assignments table
                                $assignmentQuery = "SELECT assignmentID, title, dueDate FROM assignments";

                                // Perform query for assignments
                                $assignmentResult = mysqli_query($con, $assignmentQuery);

                                // Initialize an array to store events
                                $events = [];

                                // Check if query was successful
                                if ($assignmentResult) {
                                    // Fetch data from the result set (assignmentID, title, dueDate from assignments)
                                    while ($row = mysqli_fetch_assoc($assignmentResult)) {
                                        $title = $row['title'];
                                        $dueDate = $row['dueDate'];

                                        // Format dueDate to match JavaScript date format (YYYY-MM-DD)
                                        $formattedDueDate = date('Y-m-d', strtotime($dueDate));

                                        // Add the title to the events array using dueDate as key
                                        if (!isset($events[$formattedDueDate])) {
                                            $events[$formattedDueDate] = [];
                                        }
                                        $events[$formattedDueDate][] = $title;
                                    }

                                    // Free result set
                                    mysqli_free_result($assignmentResult);
                                } else {
                                    echo "Error retrieving assignments: " . mysqli_error($con);
                                }

                                // Close connection
                                mysqli_close($con);

                                // Convert PHP $events array to JSON format for JavaScript
                                $eventsJSON = json_encode($events);
                                ?>

                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const eventsToAdd = <?php echo $eventsJSON; ?>;

                                    // Function to add a new event to the events object
                                    addEvent(selectedDate, newEvent) {
                                        if (!events[selectedDate]) {
                                            events[selectedDate] = []; // Initialize array if events don't exist for the date
                                        }
                                        events[selectedDate].push(newEvent); // Add new event to the events array for the date

                                        // Optionally, save events to localStorage or backend
                                        saveEventsToStorage(); // Custom function to save events to localStorage or backend

                                        // Refresh agenda display after adding event
                                        displayAgenda(selectedDate);
                                    }

                                    // Initial render for current month and year
                                    const today = new Date();
                                    renderCalendar(today.getMonth() + 1, today.getFullYear());
                                });
                                </script>

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

    <!--From Bootstrap documentation: Include Bootstrap’s CSS and JS. Place the <link> tag in the <head> for our CSS, and the <script> tag for our JavaScript bundle (including Popper for positioning dropdowns, poppers, and tooltips) before the closing </body>. Learn more about our CDN links.-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- Custom JavaScript -->
    <script src="js/calendar.js"></script>
</body>
</html>
