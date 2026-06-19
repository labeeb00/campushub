<?php

$xml = simplexml_load_file("announcements.xml");

?>

<!DOCTYPE html>
<html>
<head>
<title>Announcements</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
<h1>CampusHub</h1>
<p>Student Activity Management System</p>
</header>

<nav>
<a href="index.php">Home</a>
<a href="register.php">Register</a>
<a href="view_students.php">Students</a>
<a href="events.php">Events</a>
<a href="upload.php">Gallery</a>
<a href="announcements.php">Announcements</a>
<a href="multimedia.php">Multimedia</a>
</nav>

<div class="container">

<h2>Campus Announcements</h2>

<?php

foreach($xml->announcement as $announcement)
{
?>

<div class="card">

<h3><?php echo $announcement->title; ?></h3>

<p>
<strong>Date:</strong>
<?php echo $announcement->date; ?>
</p>

</div>

<?php
}
?>

</div>

<footer>
CampusHub © 2026
</footer>

</body>
</html>