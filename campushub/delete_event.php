<?php

include("includes/db.php");

$id = $_GET['id'];

mysqli_query($conn,
"DELETE FROM events WHERE event_id=$id");

header("Location:events.php");

?>