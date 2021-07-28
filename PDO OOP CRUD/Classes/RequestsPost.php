<?php

require_once 'Classes/DB.php';

class RequestsPost extends DB
{
    private $id;
    private $ful_name;
    private $phone_number;
    private $passport_number;
    private $product_name;
    private $product_price;
    private $product_guarantee;

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost(string $host)
    {
        $this->host = $host;
    }

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
     * @return mixed
     */
    public function getFulName()
    {
        return $this->ful_name;
    }

    /**
     * @param mixed $ful_name
     */
    public function setFulName($ful_name)
    {
        $this->ful_name = $ful_name;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getPassportNumber()
    {
        return $this->passport_number;
    }

    /**
     * @param mixed $passport_number
     */
    public function setPassportNumber($passport_number)
    {
        $this->passport_number = $passport_number;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * @param mixed $product_name
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;
    }

    /**
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->product_price;
    }

    /**
     * @param mixed $product_price
     */
    public function setProductPrice($product_price)
    {
        $this->product_price = $product_price;
    }

    /**
     * @return mixed
     */
    public function getProductGuarantee()
    {
        return $this->product_guarantee;
    }

    /**
     * @param mixed $product_guarantee
     */
    public function setProductGuarantee($product_guarantee)
    {
        $this->product_guarantee = $product_guarantee;
    }

    public function read()
    {
        $query = "SELECT * FROM requests";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;
    }

    public function add()
    {
        $query = "INSERT INTO requests(ful_name,phone_number,passport_number,product_name,product_price,product_guarantee) VALUES (?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            $this->getFulName(),
            $this->getPhoneNumber(),
            $this->getPassportNumber(),
            $this->getProductName(),
            $this->getProductPrice(),
            $this->getProductGuarantee()
        ]);
        header('Location:/');

    }
    public function edit($id)
    {
        $query = "SELECT * FROM requests WHERE id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;

    }


    public function update()

    {
        $query = "UPDATE requests SET ful_name=?,phone_number=?,passport_number=?,product_name=?,product_price=?,product_guarantee=? where id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            $this->getFulName(),
            $this->getPhoneNumber(),
            $this->getPassportNumber(),
            $this->getProductName(),
            $this->getProductPrice(),
            $this->getProductGuarantee(),
            $this->getId()
        ]);

        header('location:/');

    }

    public function delete()
    {
        $query = "delete  from requests where  id=?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            $this->getId()
        ]);
        header('location:/');

    }
}