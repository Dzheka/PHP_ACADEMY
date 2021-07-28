<?php

include 'DB.php';

class Post extends DB
{
    private $id;
    private $name;
    private $category;
    private $description;
    private $price;
    private $guarantee;
    private $manufacturer;
    private $model;
    private $year_of_issue;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getGuarantee()
    {
        return $this->guarantee;
    }

    /**
     * @param mixed $guarantee
     */
    public function setGuarantee($guarantee)
    {
        $this->guarantee = $guarantee;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getYearOfIssue()
    {
        return $this->year_of_issue;
    }

    /**
     * @param mixed $year_of_issue
     */
    public function setYearOfIssue($year_of_issue)
    {
        $this->year_of_issue = $year_of_issue;
    }


    public function Read()
    {
        $query = "SELECT * FROM posts";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;
    }


    public function Store()
    {
        $requests_query =
        $query = "INSERT INTO posts(name,category,description,price,guarantee,manufacturer,model,year_of_issue) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            $this->getName(), $this->getCategory(), $this->getDescription(), $this->getPrice(), $this->getGuarantee(), $this->getManufacturer(), $this->getModel(), $this->getYearOfIssue()
        ]);
        header('Location:/');
    }

    public function Edit($id)
    {
        $query = "SELECT * FROM posts WHERE id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;

    }

    public function Update()

    {
        $query = "UPDATE posts SET name=?,category=?,description=?,price=?,guarantee=?,manufacturer=?,model=?,year_of_issue=? where id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            $this->getName(),
            $this->getCategory(),
            $this->getDescription(),
            $this->getPrice(),
            $this->getGuarantee(),
            $this->getManufacturer(),
            $this->getModel(),
            $this->getYearOfIssue(),
            $this->getId()
        ]);

        header('location:/');

    }

    public function Delete()
    {
        $query = "delete  from posts where  id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            $this->getId()
        ]);
        header('location:/');

    }
}