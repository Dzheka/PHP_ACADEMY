<?php

namespace app\controllers;
use app\models\User;

class UserController
{
    public function actionIndex(): array
    {
        $users = new User();
        echo "<pre>";
        var_dump($users->all());
        echo "</pre>";
    }

    public function show($id)
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function  destroy()
    {

    }
}