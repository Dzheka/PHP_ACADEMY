<?php

function uploadProfilePicture(array $data = []) {
    $filename = "nophoto.jpg";
    if (!empty($data) && isset($data)) {
        $filename = hash('md5', $data['uphoto']['name'].date('F j, Y, g:i a')) . '.' . pathinfo($data['uphoto']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($data['uphoto']['tmp_name'], __DIR__ .'/../photos/'. $filename);
    }
    return $filename;
}

function getClientInfo() : array {
    if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }

    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    $result = [
        'uipclient' => $ip,
        'uclientbrow' => $_SERVER['HTTP_USER_AGENT']
    ];

    return $result;
}