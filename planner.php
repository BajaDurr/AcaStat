<!DOCTYPE html>
<html lang="en">
<head><?php include "php/head.php"; exec("php php/head.php");?></head>
<body>
  <header><?php include "php/navbar.php"; exec("php php/navbar.php");?></header>

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

    
    <!-- Custom JavaScript -->
    <script src="js/calendar.js"></script>

    <footer class="mt-5 text-center"><?php include "php/footer.php"; exec("php php/footer.php");?></footer>
</body>
</html>
