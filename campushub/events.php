<?php

include("includes/db.php");

$message="";

if(isset($_POST['add_event']))
{
    $event_name=$_POST['event_name'];
    $event_date=$_POST['event_date'];
    $description=$_POST['description'];

    mysqli_query($conn,
    "INSERT INTO events(event_name,event_date,description)
    VALUES('$event_name','$event_date','$description')");

    $message="Event Added Successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Events</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
<h1>CampusHub</h1>
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

<h2>Add Event</h2>

<form method="POST">

Event Name
<input type="text" name="event_name" required>

Event Date
<input type="date" name="event_date" required>

Description
<textarea name="description"></textarea>

<input type="submit" name="add_event" value="Add Event">

</form>

<p><?php echo $message; ?></p>

</div>

<div class="card">

<h2>All Events</h2>

<table>

<tr>
<th>ID</th>
<th>Event</th>
<th>Date</th>
<th>Description</th>
<th>Action</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM events");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
<td><?php echo $row['event_id']; ?></td>
<td><?php echo $row['event_name']; ?></td>
<td><?php echo $row['event_date']; ?></td>
<td><?php echo $row['description']; ?></td>

<td>
<a href="edit_event.php?id=<?php echo $row['event_id']; ?>">Edit</a>
|
<a href="delete_event.php?id=<?php echo $row['event_id']; ?>">Delete</a>
</td>
</tr>

<?php
}
?>

</table>

</div>

</div>

</body>
</html>