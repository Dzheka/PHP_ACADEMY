<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $file = $_FILES['avatar'];
    $fileName = $_FILES['avatar']['name'];
    $fileTmpName = $_FILES['avatar']['tmp_name'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    if (!file_exists('images')) {
        mkdir('images');
    }

    $fileNewName = uniqid('', true) . "." . $fileActualExt;
    $fileDes = 'images/' . $fileNewName;
    move_uploaded_file($fileTmpName, $fileDes);

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $biography = $_POST['bio'];

    $data = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'biography' => $biography,
        'avatar' => $fileDes,
        'ip' => $_SERVER['REMOTE_ADDR'],
        'browser' => explode(" ", $_SERVER['HTTP_USER_AGENT'], -1)[0]
    ];

    $sql = "INSERT INTO clients(first_name, last_name, avatar, biography, ip, browser) VALUES('{$data['first_name']}',' {$data['last_name']}', 
        '{$data['avatar']}', '{$data['biography']}', '{$data['ip']}',' {$data['browser']}')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}