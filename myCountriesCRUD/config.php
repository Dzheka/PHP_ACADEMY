<?php

    $link = mysqli_connect('localhost', 'root', '', 'countries');

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
     $query = 'SELECT * FROM  `countries`';
    $result = mysqli_query($link,$query);
    $countries = mysqli_fetch_all($result);

    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }