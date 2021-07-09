<?php

include 'DB.php';
include 'create.php';
class Post extends DB
{
    use create;
    public $id;
    public $price;
    public $description;
    public $address;
    public $user_id;
    private $conn;

    public function __construct($price=null, $description=null, $address=null, $user_id=null){
        $this->conn= new mysqli('localhost', 'root', '', 'crud_db') or die(mysqli_connect_error($this->conn));
        $this->price = $price;
        $this->description = $description;
        $this->address = $address;
        $this->user_id = $user_id;
    }

//    public function create()
//    {
//         $query = "INSERT INTO posts(`price`,`description`,`address`,`user_id`) values (
//                                                                     '{$this->price}',
//                                                                     '{$this->description}',
//                                                                     '{$this->address}',
//                                                                     '{$this->user_id}')";
//         $result = mysqli_query($this->conn, $query);
//    }

    public function read()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }
}