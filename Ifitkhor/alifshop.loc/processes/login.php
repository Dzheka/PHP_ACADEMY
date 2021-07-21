<?php

session_start();

include_once "../classes/User.php";
include_once "../classes/UserValidator.php";
include_once "../config.php";

$errors = [];

if (isset($_POST['login'])) {
    $validation = new UserValidator($_POST);
    $errors = $validation->validate();

    if (empty($errors)) {
        $users = new User();

        $name = htmlspecialchars(trim($_POST['name']));
        $password = htmlspecialchars(trim($_POST['password']));
        $password = hash('sha256', $password);
        $row = $users->index();
        foreach ($row as $user) {
            if ($user->username === $name && $password === $user->password) {
                if ($user->is_admin) {
                    $_SESSION['role'] = 'admin';
                } else {
                    $_SESSION['role'] = 'user';
                }
                $_SESSION['name'] = $name;
                $_SESSION['service'] = SITENAME;
                $_SESSION['clientip'] = "127.0.0.1";

                header('Location: /public');
            } else {
                $errors['user'] = 'User not found';
            }
        }
    }
}


