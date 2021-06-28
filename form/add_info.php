<?php
include 'bd.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$bio = $_POST['bio'];
$avatar = $_FILES['avatar']['tmp_name'];
$ip = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];


if (isset($_POST['submit'])) {
    $file = $_FILES['avatar'];
    $fileName = $_FILES['avatar']['name'];
    $fileTmpName = $_FILES['avatar']['tmp_name'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));


    $fileNewName = uniqid('', true).".".$fileActualExt;
    $fileDes = 'images/'.$fileNewName;
    move_uploaded_file($fileTmpName, $fileDes);
}

if (!$stmt = mysqli_prepare($bd, "INSERT INTO client(name, surname, bio,avatar, ip,browser) VALUES(?,?,?,?,?,?)")) {
    echo "Error";
}else{
    header('location:index.php');
}
mysqli_stmt_bind_param($stmt, "ssssss", $name, $surname, $bio, $avatar, $ip, $browser);
mysqli_stmt_execute($stmt);
