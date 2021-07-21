<?php

class DB
{

    private $host = 'localhost';
    private $user = 'root';
    private $password = 'root';
    private $dbname = 'alifshop';

    public function connect() :PDO
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    protected function cleaner($string)
    {
        return htmlspecialchars(preg_replace("/[^\w\d\s]+/u", "", $string));
    }
}