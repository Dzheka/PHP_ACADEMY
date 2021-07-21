<?php

session_start();

require_once "../classes/User.php";
include_once "../classes/UserValidator.php";
include_once "../config.php";

$errors = [];

if (isset($_POST['submit'])) {
    $validation = new UserValidator($_POST);

    $errors = $validation->validate();

    if (empty($errors)) {
        $user = new User();

        $name = htmlspecialchars(trim($_POST['name']));
        $password = hash('sha256', trim($_POST['password']));
        $email = trim($_POST['email']);

        $user->setUsername($name);
        $user->setPassword($password);
        $user->setEmail($email);

        $users = $user->index();
        foreach ($users as $person){
            if ($person->username === $name){
                $errors['name'] = 'Имя занят';
                return;
            }
        }

        $user->insert();

        $_SESSION['name'] = $name;
        $_SESSION['service'] = SITENAME;
        $_SESSION['clientip'] = "127.0.0.1";
        $_SESSION['role'] = 'user';
    }
}
