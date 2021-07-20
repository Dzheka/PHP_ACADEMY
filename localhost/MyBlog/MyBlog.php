<?php
include 'db.php';
class Blog extends DB
{
    public $id;
    public $name;
    private $email;
    private $pass;
    private $conn;

    public function __construct($name=null, $email=null, $pass=null){
        $this->conn=new mysqli('localhost','root', 'root','myblog') or die (mysqli_connect_error($this->conn));
        $this->name=$name;
        $this->email=$email;
        $this->pass=$pass;
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        }

       /* parent::set_charset('utf-8');*/
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
