<?php

class Country {
    private $id;
    private $name;

    private function cleaner($string) {
        return preg_replace("/[^\w\d\s]+/u", "", $string);
    }

    public function get($name) {
        switch($name) {
            case 'id':
                return $this->id;
            case 'name':
                return $this->name;
        }
    }

    public function set($name, $value) {
        switch($name) {
            case 'id':
                $this->id = $value;
                break;
            case 'name':
                $this->name = $value;
                break;
        }
    }

    public function __construct($data = []) {
        if (!empty($data)) {
            if (isset($data['id'])) $this->set('id', $data['id']);
            if (isset($data['name'])) $this->set('name', $data['name']);
        }
    }

    public function showall() {
        try {
            $pdo = new PDOopt();
            $list = $pdo->select(
                'SELECT countries.id, countries.name, SUM(IFNULL(cities.population, 0)) AS totalpopulation, SUM(IFNULL(cities.area, 0)) AS totalarea, SUM(IFNULL(cities.density, 0)) AS totaldensity, COUNT(cities.name) AS totalcities FROM countries LEFT JOIN cities ON countries.id=cities.country_id GROUP BY countries.id ORDER BY totalpopulation DESC'
            );

            return $list;
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function show($id) {
        try {
            $pdo = new PDOopt();
            $result = $pdo->select(
                'SELECT countries.id, countries.name FROM countries WHERE id=:id',
                [
                    new PDOArgument('id', $id, PDO::PARAM_INT)
                ]
            );

            return $result[0];
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function add() {
        try {
            $pdo = new PDOopt();
            $result = $pdo->apply(
                'INSERT INTO countries(name) VALUES
                (:name)',
                [
                    new PDOArgument('name', $this->name, PDO::PARAM_STR)
                ],
                true
            );

            return $result;
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function update() {
        try {
            $pdo = new PDOopt();
            $result = $pdo->apply(
                'UPDATE countries SET name = :name WHERE id = :id',
                [
                    new PDOArgument('id', $this->id, PDO::PARAM_INT),
                    new PDOArgument('name', $this->name, PDO::PARAM_STR)
                ],
                true
            );

            return $result;
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function remove(int $id) {
        try {
            $pdo = new PDOopt();
            $result = $pdo->apply(
                'DELETE FROM countries WHERE countries.id=:id',
                [
                    new PDOArgument('id', $id, PDO::PARAM_INT)
                ],
                true
            );
    
            return $result;
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }
}