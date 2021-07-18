<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

        <meta name="generator" content="RentBoard 1.0" />

        <title></title>
        <link rel="shortcut icon favicon" href="./includex/favicon.png" type="image/png" />

        <link rel="stylesheet" href="./includes/bootstrap.min.css" />
        <link rel="stylesheet" href="./includes/bootfix.css" />
    </head>
    <body>
        <header class="mb-3">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href=".">RentBoard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="headmenu">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href=".">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?act=requests">Объявления</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?act=services">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?act=rules">Правила</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?act=contacts">Контакты</a>
                        </li>
                    </ul>
                    <form class="form-inline" style="width: 40%;">
                        <input class="form-control mr-sm-2" style="width: 83%;" type="search" placeholder="Поиск по объявлениям" />
                        <button class="btn btn-outline-light" type="submit">Искать!</button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="btn btn-primary" href="auth.php">Войти</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>