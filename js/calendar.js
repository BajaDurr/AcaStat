document.addEventListener('DOMContentLoaded', function() {
    const monthYearElement = document.getElementById('month-year');
    const calendarDatesElement = document.getElementById('calendar-dates');
    const agendaListElement = document.getElementById('agenda-list');
    const upcomingEventsElement = document.getElementById('upcoming-events');

    // Sample event data (replace this with your actual event data)
    const events = {
        '2024-04-15': ['Event 1', 'Event 2'],
        '2024-04-20': ['Event 3'],
        '2024-04-25': ['Event 4'],
        '2024-04-30': ['Event 5'],
        '2024-05-03': ['Event 5'],
    };

    let currentMonth; // Track current displayed month
    let currentYear; // Track current displayed year

    // Function to render calendar based on month and year
    function renderCalendar(month, year) {
        currentMonth = month;
        currentYear = year;

        // Clear existing calendar dates
        calendarDatesElement.innerHTML = '';

        // Set the month and year in the title
        monthYearElement.textContent = `${getMonthName(month)} ${year}`;

        // Get the first day of the month
        const firstDay = new Date(year, month - 1, 1);
        const startingDayOfWeek = firstDay.getDay();

        // Get the number of days in the month
        const daysInMonth = new Date(year, month, 0).getDate();

        // Create calendar rows and cells
        let date = 1;
        for (let i = 0; i < 6; i++) { // 6 weeks maximum to cover all possibilities
            const row = document.createElement('tr');

            // Create cells for each day of the week
            for (let j = 0; j < 7; j++) {
                const cell = document.createElement('td');
                if (i === 0 && j < startingDayOfWeek) {
                    // Empty cells before the start of the month
                    cell.textContent = '';
                } else if (date > daysInMonth) {
                    // Stop creating cells once all days of the month are added
                    break;
                } else {
                    // Display the date
                    cell.textContent = date;
                    cell.classList.add('calendar-day'); // Add a class for styling and event handling
                    const currentDate = `${year}-${padZero(month)}-${padZero(date)}`;
                    cell.dataset.date = currentDate; // Store the date in dataset
                    date++;

                    // Check if the current date has events
                    if (events[currentDate]) {
                        // Add a dot or marker to indicate events
                        const dot = document.createElement('span');
                        dot.classList.add('event-dot');
                        cell.appendChild(dot);
                    }

                    // Add click event listener to each calendar day
                    cell.addEventListener('click', handleDayClick);
                }
                row.appendChild(cell);
            }

            calendarDatesElement.appendChild(row);

            // Stop creating rows if we've added all days of the month
            if (date > daysInMonth) {
                break;
            }
        }

        // Display upcoming events after rendering calendar
        displayUpcomingEvents();
    }

    // Helper function to get month name from month number (1-based index)
    function getMonthName(month) {
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return months[month - 1];
    }

    // Helper function to pad single digit number with leading zero (e.g., 1 => '01')
    function padZero(num) {
        return num.toString().padStart(2, '0');
    }

    // Event handler for day click
    function handleDayClick(event) {
        const selectedDate = event.target.dataset.date;
        if (selectedDate) {
            displayAgenda(selectedDate);
        }
    }

    // Function to display agenda for the selected date
    function displayAgenda(selectedDate) {
        // Clear existing agenda items
        agendaListElement.innerHTML = '';

        // Check if there are events for the selected date
        if (events[selectedDate]) {
            events[selectedDate].forEach(event => {
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item');
                listItem.textContent = event;
                agendaListElement.appendChild(listItem);
            });
        } else {
            const listItem = document.createElement('li');
            listItem.classList.add('list-group-item');
            listItem.textContent = 'No events for this date';
            agendaListElement.appendChild(listItem);
        }
    }

    // Function to display upcoming events for the next two weeks
    function displayUpcomingEvents() {
        upcomingEventsElement.innerHTML = ''; // Clear existing content

        const today = new Date();
        const endDate = new Date(today.getTime() + (14 * 24 * 60 * 60 * 1000)); // 14 days (2 weeks) from today

        let hasEvents = false;

        // Loop through each day within the next two weeks
        for (let date = new Date(today); date <= endDate; date.setDate(date.getDate() + 1)) {
            const year = date.getFullYear();
            const month = date.getMonth() + 1;
            const day = date.getDate();
            const currentDate = `${year}-${padZero(month)}-${padZero(day)}`;
            
            if (events[currentDate]) {
                events[currentDate].forEach(event => {
                    const eventDate = new Date(currentDate);

                    const eventDateString = `${getMonthName(eventDate.getMonth() + 1)} ${eventDate.getDate()}, ${eventDate.getFullYear()}`;
                    const listItem = document.createElement('li');
                    listItem.textContent = `${eventDateString}: ${event}`;
                    upcomingEventsElement.appendChild(listItem);
                });
                hasEvents = true;
            }
        }

        // Display message if no events within the next two weeks
        if (!hasEvents) {
            upcomingEventsElement.textContent = 'Agenda clear for the next two weeks!';
        }
    }

    // Function to handle navigation to previous month
    function showPreviousMonth() {
        currentMonth--;
        if (currentMonth < 1) {
            currentMonth = 12;
            currentYear--;
        }
        renderCalendar(currentMonth, currentYear);
    }

    // Function to handle navigation to next month
    function showNextMonth() {
        currentMonth++;
        if (currentMonth > 12) {
            currentMonth = 1;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    }

    // Initial render for current month and year
    const today = new Date();
    renderCalendar(today.getMonth() + 1, today.getFullYear());

    // Add event listeners to navigation buttons
    const prevMonthButton = document.getElementById('prev-month-button');
    const nextMonthButton = document.getElementById('next-month-button');

    prevMonthButton.addEventListener('click', showPreviousMonth);
    nextMonthButton.addEventListener('click', showNextMonth);
});
