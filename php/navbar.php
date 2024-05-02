<?php
echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">';
echo '<div class="container-fluid">';
echo '<img class="mb-4" src="assets/CAP_LOGO.png" alt="" width="5%" height=auto></img>';
echo '<a class="navbar-brand" href="#">AcaStat</a>';
echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">';
echo '<span class="navbar-toggler-icon"></span>';
echo '</button>';
echo '<div class="collapse navbar-collapse" id="navbarNavDropdown">';
echo '<ul class="navbar-nav">';
echo '<li class="nav-item">';
echo '<a class="nav-link active" aria-current="page" href="home.php">Home</a>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link active" aria-current="page" href="#">Search Catalogue</a>';
echo '</li>';
echo '<li class="nav-item dropdown">';
echo '<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Institution</a>';
echo '<ul class="dropdown-menu">';
echo '<li><a class="dropdown-item" href="#">Action</a></li>';
echo '<li><a class="dropdown-item" href="#">Another action</a></li>';
echo '<li><a class="dropdown-item" href="#">Something else here</a></li>';
echo '<li><hr class="dropdown-divider"></li>';
echo '<li><a class="dropdown-item" href="#">Separated link</a></li>';
echo '</ul>';
echo '</li>';
echo '<li class="nav-item dropdown">';
echo '<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Courses</a>';
echo '<ul class="dropdown-menu">';
echo '<li><a class="dropdown-item" href="#">Action</a></li>';
echo '<li><a class="dropdown-item" href="#">Another action</a></li>';
echo '<li><a class="dropdown-item" href="#">Something else here</a></li>';
echo '<li><hr class="dropdown-divider"></li>';
echo '<li><a class="dropdown-item" href="#">Separated link</a></li>';
echo '</ul>';
echo '</li>';

if ($conn) {
	$uname = $_SESSION["username"];
	$sql = "SELECT * FROM users INNER JOIN admins WHERE username = '$uname' AND users.userID = admins.userID";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {

		echo '<li class="nav-item dropdown">';
		echo '<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Admin Tools</a>';
		echo '<ul class="dropdown-menu">';
		echo '<li><a class="dropdown-item" href="create_user.php">Create New User</a></li>';
		echo '<li><a class="dropdown-item" href="create_course.php">Create New Course</a></li>';
		echo '</ul>';
		echo '</li>';
	}

}
echo '</ul>';
echo '</div>';
echo '</div>';
echo '</nav>';
?>