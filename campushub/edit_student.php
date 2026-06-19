<?php

include("includes/db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM students WHERE student_id=$id");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    mysqli_query($conn,
    "UPDATE students
    SET full_name='$name',
        email='$email',
        phone='$phone'
    WHERE student_id=$id");

    header("Location:view_students.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
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

<h2>Edit Student</h2>

<form method="POST">

Name
<input type="text"
name="name"
value="<?php echo $row['full_name']; ?>"
required>

Email
<input type="email"
name="email"
value="<?php echo $row['email']; ?>"
required>

Phone
<input type="text"
name="phone"
value="<?php echo $row['phone']; ?>">

<input type="submit"
name="update"
value="Update Student">

</form>

</div>
</div>

<footer>
CampusHub © 2026
</footer>

</body>
</html>