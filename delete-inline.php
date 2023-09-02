<?php

include 'utils.php';
include 'db.php';
try {
    if (isset($_POST['sid']) && $_POST['sid'] != '') {
        $id = $_POST['sid'];
    } else {
        dd("Invalid ID");
    }

    $sql = "delete from student where sid={$id}";
    //dd($sql);
    $result = $conn->query($sql);

    header('Location: http://localhost/crud/index.php');
    $conn->close();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
