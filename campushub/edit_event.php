<?php

include("includes/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM events WHERE event_id=$id");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $description = $_POST['description'];

    mysqli_query($conn,
    "UPDATE events
    SET event_name='$event_name',
        event_date='$event_date',
        description='$description'
    WHERE event_id=$id");

    header("Location:events.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Event</title>
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
<div class="card">

<h2>Edit Event</h2>

<form method="POST">

Event Name
<input type="text"
name="event_name"
value="<?php echo $row['event_name']; ?>"
required>

Event Date
<input type="date"
name="event_date"
value="<?php echo $row['event_date']; ?>"
required>

Description

<textarea name="description"><?php echo $row['description']; ?></textarea>

<input type="submit"
name="update"
value="Update Event">

</form>

</div>
</div>

<footer>
CampusHub © 2026
</footer>

</body>
</html>