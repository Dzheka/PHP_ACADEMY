<?php

class City {
    private $id;
    private $name;
    private $population;
    private $area;
    private $density;
    private $is_active;
    private $country_id;

    private function cleaner($string) {
        return preg_replace("/[^\w\d\s]+/u", "", $string);
    }

    public function get($name) {
        switch($name) {
            case 'id':
                return $this->id;
            case 'name':
                return $this->name;
            case 'population':
                return $this->population;
            case 'area':
                return $this->area;
            case 'density':
                return $this->density;
            case 'is_active':
                return $this->is_active;
            case 'country':
                return $this->country;
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
            case 'population':
                $this->population = $value;
                break;
            case 'area':
                $this->area = $value;
                break;
            case 'density':
                $this->density = $value;
                break;
            case 'is_active':
                $this->is_active = $value;
                break;
            case 'country_id':
                $this->country_id = $value;
                break;
        }
    }

    public function __construct($data = []) {
        if (!empty($data)) {
            if (isset($data['id'])) $this->set('id', $data['id']);
            if (isset($data['name'])) $this->set('name', $data['name']);
            if (isset($data['population'])) $this->set('population', $data['population']);
            if (isset($data['area'])) $this->set('area', $data['area']);
            if (isset($data['area']) && isset($data['population'])) $this->set(
                'density', 
                ((int) $data['population'] / (int) $data['area'])
            );
            if (isset($data['is_active'])) $this->set('is_active', $data['is_active']);
            if (isset($data['country_id'])) $this->set('country_id', $data['country_id']);
        }
    }

    public function showall() {
        try {
            $pdo = new PDOopt();
            $list = $pdo->select(
                'SELECT cities.id, cities.name, cities.population, cities.area, cities.density, countries.name AS country FROM cities INNER JOIN countries ON cities.country_id=countries.id WHERE cities.is_active=TRUE ORDER BY cities.population DESC'
            );

            return $list;
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function show($id) {
        try {
            $pdo = new PDOopt();
            $list = $pdo->select(
                'SELECT cities.id, cities.name, cities.population, cities.area, cities.density, cities.is_active, countries.name AS countryname, countries.id AS countryid FROM cities INNER JOIN countries ON cities.country_id=countries.id WHERE cities.id=:id',
                [
                    new PDOArgument('id', $id, PDO::PARAM_INT)
                ]
            );

            return $list[0];
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function add() {
        try {
            $pdo = new PDOopt();
            $result = $pdo->apply(
                'INSERT INTO cities(name, population, area, density, is_active, country_id) VALUES
                (:name, :population, :area, :density, :is_active, :country_id)',
                [
                    new PDOArgument('name', $this->name, PDO::PARAM_STR),
                    new PDOArgument('population', $this->population, PDO::PARAM_INT),
                    new PDOArgument('area', $this->area, PDO::PARAM_INT),
                    new PDOArgument('density', $this->density, PDO::PARAM_STR),
                    new PDOArgument('is_active', $this->is_active, PDO::PARAM_BOOL),
                    new PDOArgument('country_id', $this->country_id, PDO::PARAM_INT)
                ]
            );

            var_dump($result);

            return $result;
        } catch (PDOException $exp) {
            throw new Exception("Database error:". $exp->getMessage());
        }
    }

    public function update() {
        try {
            $pdo = new PDOopt();
            $result = $pdo->apply(
                'UPDATE cities SET name=:name, population=:population, area=:area, density=:density, is_active=:is_active, country_id=:country_id WHERE cities.id=:id',
                [
                    new PDOArgument('id', $this->id, PDO::PARAM_INT),
                    new PDOArgument('name', $this->name, PDO::PARAM_STR),
                    new PDOArgument('population', $this->population, PDO::PARAM_INT),
                    new PDOArgument('area', $this->area, PDO::PARAM_INT),
                    new PDOArgument('density', $this->density, PDO::PARAM_STR),
                    new PDOArgument('is_active', $this->is_active, PDO::PARAM_BOOL),
                    new PDOArgument('country_id', $this->country_id, PDO::PARAM_INT)
                ]
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
                'DELETE FROM cities WHERE cities.id=:id',
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