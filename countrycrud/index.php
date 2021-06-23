<?php

session_start();
require_once('config.php');
// CRUD for it
// index.php create.php delete.php update.php

$act = (isset($_GET['act'])) ? $_GET['act'] : "";
$alert = [];

switch($act) {
    case 'create':
        create();
        break;
    case 'update':
        update();
        break;
    case 'delete':
        delete();
        break;
    default:
        index();
}

function index() {
    $content = [];
    $content['cities'] = City::showall();
    $content['countries'] = Country::showall();
    require_once(TEMPLATES. 'content.php');
}

function create() {
    $content = [];
    if (isset($_GET['md']) && isset($_POST)) {
        if ($_GET['md'] === 'city') {
            $city = new City($_POST);
            $city->add();

            header("Location: ?". http_build_query(array(
                'alert-type' => 'success',
                'alert-message' => 'The city with name '. $_POST['name'] .' has been added successfully!'
            )));
        } elseif ($_GET['md'] === 'country') {
            $country = new Country($_POST);
            $result = $country->add();

            header("Location: ?". http_build_query(array(
                'alert-type' => 'success',
                'alert-message' => 'The country with name '. $_POST['name'] .' has been added successfully!'
            )));
        } else {
            header("Location: .");
        }
    } else {
        $countries = new Country();
        $content['countries'] = $countries->showall();
        require_once(TEMPLATES. 'create.php');
    }
}

function update() {
    $content = [];
    if (isset($_GET['md'])) {
        if ($_GET['md'] === 'city') {
            if (!empty($_POST)) {
                $country = new City($_POST);
                $country->update();

                header("Location: ?". http_build_query(array(
                    'alert-type' => 'success',
                    'alert-message' => 'The '. $_GET['md'] .' with id '. $_POST['id'] .' has been updated successfully!'
                )));
            }
            
            $city = new City();
            $content['city'] = $city::show(intval($_GET['id']));;
            $country = new Country();
            $content['countries'] = $country::showall();
            require_once(TEMPLATES. 'update.php');
        } elseif ($_GET['md'] === 'country') {
            if (!empty($_POST)) {
                $country = new Country($_POST);
                $country->update();

                header("Location: ?". http_build_query(array(
                    'alert-type' => 'success',
                    'alert-message' => 'The '. $_GET['md'] .' with id '. $_POST['id'] .' has been updated successfully!'
                )));
            }
            
            $country = new Country();
            $content['country'] = $country::show(intval($_GET['id']));
            require_once(TEMPLATES. 'update.php');
        }
    }
}

function delete() {
    if (isset($_POST)) {
        if (isset($_POST['type'])) {
            if ($_POST['type'] === 'city') {
                $city = new City();
                $city->remove((int) $_POST['id']);
            } elseif ($_POST['type'] === 'country') {
                $country = new Country();
                $country->remove((int) $_POST['id']);
            }

            header("Location: ?". http_build_query(array(
                'alert-type' => 'danger',
                'alert-message' => 'The '. $_POST['type'] .' with id '. $_POST['id'] .' has been deleted successfully!'
            )));
        }
    }
}