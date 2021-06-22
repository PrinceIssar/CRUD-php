<?php
//all same data as savedata.php just command are different

// sid is in hidden form but we don't need the id in the webpage as it's not useful for us, that's why hidden form in edit.php input tag
$stu_id   = $_POST['sid'];
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['sclass'];
$stu_phone = $_POST['sphone'];


$conn = mysqli_connect("localhost", "admin", "becode", "crud") or die("Connection Failed");
// update command
$sql = "UPDATE crud.student SET sname ='{$stu_name}', saddress= '{$stu_address}', sclass = '{$stu_class}', sphone = '{$stu_phone}' WHERE sid = {$stu_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");


header("Location: http://localhost/crud-php/index.php");
mysqli_close($conn);

