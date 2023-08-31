<?php

$conn = new mysqli('localhost', 'root', '', 'crud');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}
