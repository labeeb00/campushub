<?php

include("includes/db.php");

$message="";

if(isset($_POST['upload']))
{
    $file_name=$_FILES['photo']['name'];
    $temp_name=$_FILES['photo']['tmp_name'];

    move_uploaded_file(
    $temp_name,
    "uploads/".$file_name);

    mysqli_query($conn,
    "INSERT INTO uploads(file_name)
    VALUES('$file_name')");

    $message="File Uploaded Successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Gallery</title>
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

<h2>Upload Event Photo</h2>

<form method="POST" enctype="multipart/form-data">

<input type="file" name="photo" required>

<br><br>

<input type="submit" name="upload" value="Upload">

</form>

<p><?php echo $message; ?></p>

</div>

<div class="card">

<h2>Gallery</h2>

<?php

$result=mysqli_query($conn,
"SELECT * FROM uploads");

while($row=mysqli_fetch_assoc($result))
{
?>

<img
src="uploads/<?php echo $row['file_name']; ?>"
width="250"
style="margin:10px;border-radius:10px;">

<?php
}
?>

</div>

</div>

</body>
</html>