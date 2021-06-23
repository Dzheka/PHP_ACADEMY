<?php

class PDOOptException extends PDOException {}

class PDOArgument {
    private $name;
    private $value;
    private $type;

    public function __construct(string $name, string $value, string $type) {
        $this->name = ':'. $name;
        $this->value = $value;
        $this->type = $type;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getValue() : string {
        return $this->value;
    }

    public function getType() : string {
        return $this->type;
    }
}

class PDOopt {
    protected $pdo;

    public function __construct() {
        $this->pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
    }

    public function __desctuct() {
        $this->pdo = null;
    }

    public function apply(string $sql, array $options = [], bool $returnStatus = false) {
        try {
            $que = $this->pdo->prepare($sql);
            foreach ($options as $option) {
                $que->bindValue(
                    $option->getName(),
                    $option->getValue(),
                    $option->getType()
                );
            }

            $status = $que->execute();
            return $returnStatus ? $status : $que;
        } catch (PDOException $exp) {
            throw new PDOOptException("Database error: ". $exp->getMessage());
        }
    }

    public function select(string $sql, array $options = []) {
        return $this->apply($sql, $options)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute(string $sql, array $option = []) {
        return $this->apply($sql, $options)->rowCount();
    }
}