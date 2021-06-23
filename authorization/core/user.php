<?php

class User {
    public $uname;
    public $usurname;
    public $ubio;
    public $uphoto;

    public function __contruct(array $data) {
        if (!empty($data)) {
            if (isset($data['uname'])) $this->uname = $data['uname'];
            if (isset($data['usurname'])) $this->usurname = $data['usurname'];
            if (isset($data['ubio'])) $this->ubio = $data['ubio'];
            if (isset($data['uphoto'])) $this->uphoto = $data['uphoto'];
        }
    }

    public function add() {
        try {
            $pdo = new PDOopt();
            var_dump($this->uname);
            $resutl = $pdo->apply(
                "INSERT INTO users(uname, usurname, ubio, uphoto) 
                VALUES (:uname, :usurname, :ubio, :uphoto)",
                [
                    new PDOArgument('uname', $this->uname, PDO::PARAM_STR),
                    new PDOArgument('usurname', $this->usurname, PDO::PARAM_STR),
                    new PDOArgument('ubio', $this->ubio, PDO::PARAM_STR),
                    new PDOArgument('uphoto', $this->uphoto, PDO::PARAM_STR),
                ]
            );

            return $result;
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function getUsersCount() {

    }

    public function getRandomUserProfile() {

    }
}