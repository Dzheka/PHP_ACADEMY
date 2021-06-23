<?php

class User {
    public $uname;
    public $usurname;
    public $ubio;
    public $uphoto;
    public $uipclient;
    public $uclientbrow;

    public function __construct(array $data = []) {
        if (!empty($data)) {
            if (isset($data['uname'])) $this->uname = $data['uname'];
            if (isset($data['usurname'])) $this->usurname = $data['usurname'];
            if (isset($data['ubio'])) $this->ubio = $data['ubio'];
            if (isset($data['uphoto'])) $this->uphoto = $data['uphoto'];
            if (isset($data['uipclient'])) $this->uipclient = $data['uipclient'];
            if (isset($data['uclientbrow'])) $this->uclientbrow = $data['uclientbrow'];
        }
    }

    public function add() {
        try {
            $pdo = new PDOopt();
            $result = $pdo->apply(
                "INSERT INTO users(uname, usurname, ubio, uphoto, ipclient, clientbrow) 
                VALUES (:uname, :usurname, :ubio, :uphoto, :uipclient, :uclientbrow)",
                [
                    new PDOArgument('uname', $this->uname, PDO::PARAM_STR),
                    new PDOArgument('usurname', $this->usurname, PDO::PARAM_STR),
                    new PDOArgument('ubio', $this->ubio, PDO::PARAM_STR),
                    new PDOArgument('uphoto', $this->uphoto, PDO::PARAM_STR),
                    new PDOArgument('uipclient', $this->uipclient, PDO::PARAM_STR),
                    new PDOArgument('uclientbrow', $this->uclientbrow, PDO::PARAM_STR)
                ],
                true
            );

            return $result;
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function getUsersCount() {
        try {
            $pdo = new PDOopt();
            $result = $pdo->select(
                "SELECT COUNT(id) as howmany FROM users"
            );

            return $result[0];
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function getRandomUserProfile() {
        $count = $this->getUsersCount();
        $counts = [
            'first' => rand(0, (int) $count['howmany']),
            'second' => rand(0, (int) $count['howmany']),
            'third' => rand(0, (int) $count['howmany']),
            'fourth' => rand(0, (int) $count['howmany']),
            'fifth' => rand(0, (int) $count['howmany']),
        ];

        try {
            $pdo = new PDOopt();
            $result = $pdo->select(
                "SELECT uphoto FROM users WHERE id IN(:first, :second, :third, :fourth, :fifth);",
                [
                    new PDOArgument('first', $counts['first'], PDO::PARAM_INT),
                    new PDOArgument('second', $counts['second'], PDO::PARAM_INT),
                    new PDOArgument('third', $counts['third'], PDO::PARAM_INT),
                    new PDOArgument('fourth', $counts['fourth'], PDO::PARAM_INT),
                    new PDOArgument('fifth', $counts['fifth'], PDO::PARAM_INT)
                ]
            );

            return $result;
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }
}