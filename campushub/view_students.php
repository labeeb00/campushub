<?php
include("includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Registered Students</h1>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Action</th>
</tr>

<?php

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
    <td><?php echo $row['student_id']; ?></td>
    <td><?php echo $row['full_name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phone']; ?></td>

    <td>
        <a href="edit_student.php?id=<?php echo $row['student_id']; ?>">Edit</a>
        |
        <a href="delete_student.php?id=<?php echo $row['student_id']; ?>">Delete</a>
    </td>
</tr>

<?php
}
?>
<?php
include("includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Students</title>
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

<h2>Registered Students</h2>

<table>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM students");

while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
<td><?php echo $row['student_id']; ?></td>
<td><?php echo $row['full_name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>

<td>
<a href="edit_student.php?id=<?php echo $row['student_id']; ?>">Edit</a>
|
<a href="delete_student.php?id=<?php echo $row['student_id']; ?>">Delete</a>
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
</table>

<br><br>

<a href="register.php">Add New Student</a>

</body>
</html>