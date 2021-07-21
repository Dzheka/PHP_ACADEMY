<?php

include "DB.php";

class Product extends DB
{
    private int $id;
    private string $productName;
    private string $description;
    private int $price;
    private int $guarantee;
    private string $category;
    private string $manufacturer;
    private string $model;
    private int $yearOfIssue;
    private $productImage;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = (int)$id;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @param mixed $productName
     */
    public function setProductName($productName): void
    {
        $this->productName = htmlspecialchars(trim($productName));
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = htmlspecialchars(trim($description));
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = (int)$price;
    }

    /**
     * @return int
     */
    public function getGuarantee(): int
    {
        return $this->guarantee;
    }

    /**
     * @param mixed $guarantee
     */
    public function setGuarantee($guarantee): void
    {
        $this->guarantee = (int)$guarantee;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer): void
    {
        $this->manufacturer = htmlspecialchars(trim($manufacturer));
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = htmlspecialchars(trim($model));
    }

    /**
     * @return int
     */
    public function getYearOfIssue() :int
    {
        return $this->yearOfIssue;
    }

    /**
     * @param mixed $yearOfIssue
     */
    public function setYearOfIssue($yearOfIssue): void
    {
        $this->yearOfIssue = (int)$yearOfIssue;
    }

    /**
     * @return mixed
     */
    public function getProductImage()
    {
        return $this->productImage;
    }

    /**
     * @param mixed $productImage
     */
    public function setProductImage($productImage): void
    {
        $this->productImage = $productImage;
    }


    public static function show($category = null, $id = null): array
    {
        $query = "SELECT * FROM `products`";
        if ($category) {
            $query = "SELECT * FROM `products` WHERE  `category` = '{$category}'";
        } elseif ($id){
            $query = "SELECT * FROM `products` WHERE id = '{$id}' ";
        }

        $stmt = (new DB)->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function search($search): array
    {
        $query = '';
        if (empty($search)) {
            $query = (new DB)->connect()->query("SELECT * FROM `products`");
        } else {
            $query = (new DB)->connect()->query("SELECT * FROM `products` WHERE `product_name` LIKE '%$search%'");
        }
        (new DB)->cleaner($search);
        return $query->fetchAll();
    }

    public function store(): void
    {
        $query = "INSERT INTO `products`(product_name, description, price, category, guarantee, manufacturer, model, year_of_issue, product_image)
VALUES (:product_name, :description, :price, :category, :guarantee, :manufacturer, :model, :year_of_issue, :image)";
        $statement = $this->connect()->prepare($query);

        $statement->execute([
            ':product_name' => $this->getProductName(),
            ':description' => $this->getDescription(),
            ':price' => $this->getPrice(),
            ':category' => $this->getCategory(),
            ':guarantee' => $this->getGuarantee(),
            ':manufacturer' => $this->getManufacturer(),
            ':model' => $this->getModel(),
            ':year_of_issue' => $this->getYearOfIssue(),
            ':image' => $this->getProductImage()
        ]);

        header('Location: /public');
    }

    public function delete(): void
    {
        $query = "DELETE FROM products WHERE id = :id";
        $statement = $this->connect()->prepare($query);
        $statement->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        $statement->execute();

        header('Location: /public');
    }

    public function update() :void
    {
        $query = "UPDATE `products` SET `product_name` = :product_name,`description` = :description , `price` = :price";
        $query .= ", `category` = :category, guarantee = :guarantee, manufacturer = :manufacturer, model =:model";
        $query .= ", year_of_issue = :yearOfIssue, product_image = :image WHERE id = :id";
        $statement = $this->connect()->prepare($query);
//        $statement->bindValue(':product_name', $this->getProductName());
//        $statement->bindValue(':description', $this->getDescription());
//        $statement->bindValue(':price', $this->getPrice());
//        $statement->bindValue(':category', $this->getCategory());
//        $statement->bindValue(':guarantee', $this->getGuarantee());
//        $statement->bindValue(':manufacturer', $this->getManufacturer());
//        $statement->bindValue(':model', $this->getModel());
//        $statement->bindValue(':yearOfIssue', $this->getYearOfIssue());
//        $statement->bindValue(':image', $this->getProductImage());
//        $statement->bindValue(':id', $this->getId());
        $statement->execute( [
            ':product_name' => $this->getProductName(),
            ':description' => $this->getDescription(),
            ':price' => $this->getPrice(),
            ':category' => $this->getCategory(),
            ':guarantee' => $this->getGuarantee(),
            ':manufacturer' => $this->getManufacturer(),
            ':model' => $this->getModel(),
            ':yearOfIssue' => $this->getYearOfIssue(),
            ':image' => $this->getProductImage(),
            ':id' => $this->getId()
        ]);

        header('Location: /public');
//        print_r($statement);
    }

}