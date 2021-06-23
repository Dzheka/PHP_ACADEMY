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
    $users = new User();
    $page['title'] = "Main page";
    $page['users'] = $users->getUsersCount();
    $page['userphotoes'] = $users->getRandomUserProfile();

    require_once(TEMPLATES. 'main.php');
}

function regist() {
    $page['title'] = "Registration";

    if (!empty($_POST)) {
        $photo = uploadProfilePicture($_FILES);
        $client = getClientInfo();
        $data = array_merge($_POST, ['uphoto' => './photos/'. $photo], $client);
        $user = new User($data);
        $user->add();

        header("Location: ?". http_build_query(array(
            'alert-type' => 'success',
            'alert-message' => 'The user '. $_POST['uname'] ." ". $_POST['usurname'] .' has been created'
        )));

    } else {
        require(TEMPLATES. 'regist.php');
    }
}