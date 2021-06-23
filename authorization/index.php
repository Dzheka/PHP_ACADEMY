<?php

require_once('config.php');

$act = (isset($_GET['act'])) ? $_GET['act'] : "";

switch ($act) {
    case 'register':
        regist();
        break;
    default:
        main();
}

function main() {
    // $users = new User();
    $page['title'] = "Main page";
    // $page['users'] = $user->getAllUsers();

    require_once(TEMPLATES. 'main.php');
}

function regist() {
    $page['title'] = "Registration";

    if (!empty($_POST)) {
        // $_POST['uphoto'] = uploadProfilePicture($_FILES);
        var_dump($_POST);
        $user = new User($_POST);
        var_dump($user);
        $user->add();

        header("Location: ?". http_build_query(array(
            'alert-type' => 'success',
            'alert-message' => 'The user '. $_POST['uname'] ." ". $_POST['usurname'] .' has been created'
        )));

    } else {
        require(TEMPLATES. 'regist.php');
    }
}