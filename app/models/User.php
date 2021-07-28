<?php

namespace app\models;

use app\models\DB;

class User extends DB
{
    public function all()
    {
        $result = mysqli_query($this->connect(), "SELECT * FROM `posts`");

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}