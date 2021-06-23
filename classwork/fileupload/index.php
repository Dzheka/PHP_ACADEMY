<?php

ini_set("display_errors", TRUE); // On deploy change it to FALSE;

const CLIENTIP = "10.0.2.2";
const ALLTOKEN = "ASDJAISDO123U1I2J312N192831J2EN";
const FILETYPE = "image/jpeg";
const FILESIZE = 2048;

function getClientInfo() : string {
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

    return $ip;
}

function giveResult(int $code) {
    switch ($code) {
        case 0:
            $message = "Success";
            break;
        case -1:
            $message = "This IP address is not allowed!";
            break;
        case -2:
            $message = "Incorrect token, please check you token string!";
            break;
        case -3:
            $message = "Incorrect file type";
            break;
        case -4:
            $message = "File size is too big";
            break;
        case -5:
            $message = "File width is too big";
            break;
        case -6:
            $message = "File height is too big";
            break;
        case -9:
            $message = "No data was applied";
            break;
        default:
            $message = "Unknow error";
    }

    $result = [
        'err_code' => $code,
        'err_msg' => $message
    ];

    echo json_encode($result);
    die();
}

function checkClientIp(string $client, string $hastobe) : bool {
    return ($client === $hastobe) ? TRUE : FALSE;
}

function checkClientToken(string $client = "", string $hastobe) : bool {
    return ($client === $hastobe) ? TRUE : FALSE;
}

function checkImageWidth(string $imagepath, int $maxwidth) : bool {
    $imageinfo = getimagesize($imagepath);
    return ($imageinfo[0] < $maxwidth) ? TRUE : FALSE;
}

function checkImageHeight(string $imagepath, int $maxheight) : bool {
    $imageinfo = getimagesize($imagepath);
    return ($imageinfo[1] < $maxheight) ? TRUE : FALSE;
}

function checkFileType(string $filepath, string $hastobe) : bool {
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);
    finfo_close($fileinfo);

    return ($filetype === $hastobe) ? TRUE : FALSE; 
}

function checkFileSize(string $path, int $maxsize) : bool {
    return (filesize($path) > $maxsize) ? TRUE : FALSE;
}

if (!empty($_POST) && !empty($_FILES)) {
    if (!checkClientIp(getClientInfo(), CLIENTIP)) giveResult(-1);

    if (!checkClientToken($_POST['token'], ALLTOKEN)) giveResult(-2);

    if (!checkFileSize($_FILES['image']['tmp_name'], FILESIZE)) giveResult(-4);
    if (!checkImageWidth($_FILES['image']['tmp_name'], 2000)) giveResult(-5);
    if (!checkImageHeight($_FILES['image']['tmp_name'], 2000)) giveResult(-6);

    if (checkFileType($_FILES['image']['tmp_name'], FILETYPE)) {
        try {
            move_uploaded_file($_FILES['image']['tmp_name'], $_FILES['image']['name']);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        giveResult(-3);
    }

    giveResult(0);
} else {
    giveResult(-9);
}