<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <!--Logo-->
        <img src="assets/CAP_LOGO.png" alt="AcaStat Logo" width="5%" height="auto">

        <!--Project Name-->
        <a class="navbar-brand">AcaStat</a>

        <ul class="nav nav-tabs me-auto mb-2 mb-lg-0" id="myTab" role="tablist">

            <!--Home-->
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>

            <!--Search Catalogue-->
            <li class="nav-item">
                <a class="nav-link"  href="search_course.php">Search Catalogue</a>
            </li>

            <!--Institution-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Institution</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </li>

            <!--Courses-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Courses</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
            </li>

            <!--Admin Tools-->
            <?php 
            if ($conn) {
                $uname = $_SESSION["username"];
                $sql = "SELECT * FROM users INNER JOIN admins WHERE username = '$uname' AND users.userID = admins.userID";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) {
                    echo '<li class="nav-item dropdown">';
                    echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin Tools</a>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="create_user.php">Create New User</a></li>';
                    echo '<li><a class="dropdown-item" href="create_course.php">Create New Course</a></li>';
                    echo '</ul>';
                    echo '</li>';
                }
            }
            ?>
        </ul>

        <!--Logout button-->
        <form action="php/logout.php" method="post" class="d-flex">
            <button type="submit" class="btn btn-outline-dark me-2">Sign Out <i class="bi bi-box-arrow-right"></i></button>
        </form>

    </div>
</nav>