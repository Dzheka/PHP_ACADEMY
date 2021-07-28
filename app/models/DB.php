<?php

namespace app\models;

class DB
{
    public function connect()
    {
        $conn = mysqli_connect('localhost', 'root', 'Password', 'test')
            or die(mysqli_error($conn));
        return $conn;
    }
}