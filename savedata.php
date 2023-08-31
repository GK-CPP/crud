<?php

$stu_address = $_POST['saddress'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['sphone'];
$stu_name = $_POST['sname'];

$conn = mysqli_connect('localhost', 'root', '', 'crud') or die('Connection Failed');
$sql = "insert into student(sname, address, sclass, sphone) values('{$stu_name}', '{$stu_address}', '{$stu_class}', '{$stu_phone}')";
$result = mysqli_query($conn, $sql) or die('Query Failed.');

header('Location: http://localhost/crud_html/index.php');

mysqli_close($conn);
