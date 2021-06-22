<?php
// put the value of all the form from add.php

// so we basically took the data from sname, saddress and like that for other
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['sphone'];


$conn = mysqli_connect("localhost", "admin", "becode", "crud") or die("Connection Failed");

//to save the data we write insert query                                      {} because we need to write the variable we created
$sql = "INSERT INTO crud.student(sname, saddress, sclass, sphone) VALUES ('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

//to redirect the data into index page, once data saved this page will open
header("Location: http://localhost/crud-php/index.php");
mysqli_close($conn);

