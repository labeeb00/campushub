<?php
include("includes/db.php");

$message = "";

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(empty($name) || empty($email))
    {
        $message = "Name and Email are required!";
    }
    else
    {
        $sql = "INSERT INTO students(full_name,email,phone)
                VALUES('$name','$email','$phone')";

        if(mysqli_query($conn,$sql))
        {
            $message = "Student Registered Successfully!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
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

<h2>Student Registration</h2>

<form method="POST">

Name
<input type="text" name="name" required>

Email
<input type="email" name="email" required>

Phone
<input type="text" name="phone">

<input type="submit" name="submit" value="Register Student">

</form>

<p><?php echo $message; ?></p>

</div>
</div>

</body>
</html>