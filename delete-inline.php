<?php

$stu_id = $_GET['id'];

include 'config.php';

$sql = "DELETE FROM crud.student WHERE sid = {$stu_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/crud-php/index.php");
mysqli_close($conn);