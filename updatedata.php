<?php

try {
    $stu_id = $_POST['sid'];
    $stu_address = $_POST['saddress'];
    $stu_class = $_POST['sclass'];
    $stu_phone = $_POST['sphone'];
    $stu_name = $_POST['sname'];

    include 'db.php';

    $sql = "update student set sname='{$stu_name}', address='{$stu_address}', sclass='{$stu_class}', sphone='{$stu_phone}' where sid={$stu_id}";
    // var_dump($sql);
    // die;
    $result = $conn->query($sql);

    header('Location: http://localhost/crud/index.php');

    $conn->close();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
