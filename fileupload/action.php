<?php

try{
    $conn = new PDO("mysql:host=localhost;dbname=clients_db", "root", "root");
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $avatar = $_FILES['avatar']['name'];
    $bio = $_POST["bio"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER["HTTP_USER_AGENT"];
    $sql = "INSERT INTO `clients` (`name`, `surname`, `avatar`, `bio`, `ip`, `browser`) VALUES ('$name', '$surname', '$avatar', '$bio', '$ip', '$browser')";
    $statement = $conn->prepare($sql);
    $res = $statement->execute();
    move_uploaded_file($_FILES['avatar']['tmp_name'], 'temp/'.$_FILES['avatar']['name']);
    var_dump($res); die;
    header('Location: /');
}catch(PDOException $e){
    echo $e->getMessage();
}