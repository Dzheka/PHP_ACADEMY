<?php

$conn = mysqli_connect('localhost', 'root', 'root');

if (!mysqli_errno($conn)){
    echo mysqli_error($conn);
}
$query = "CREATE DATABASE notes CHARSET UTF-8";
$query = "Create TABLE `notes`(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    note VARCHAR(255)
)";
mysqli_query($conn, $query);
