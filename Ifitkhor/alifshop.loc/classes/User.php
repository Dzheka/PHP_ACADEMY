<?php


include_once "DB.php";

class User extends DB
{
    private string $username;
    private string $password;
    private string $email;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = htmlspecialchars(trim($username));
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = htmlspecialchars(trim($password));
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = trim($email);
    }


    public function index() :array
    {
        $query = "SELECT * FROM `users`";
        $stmt = (new DB)->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insert()
    {
        $query = "INSERT INTO `users`(username, password, email) VALUES ( :name, :password, :email)";
        $statement = $this->connect()->prepare($query);
        $statement->execute([
            'name' => $this->getUsername(),
            'password' => $this->getPassword(),
            'email' => $this->getEmail()
        ]);
        header('Location: /public');
    }

    public function login($name, $password)
    {
        $query = "SELECT * FROM `users` WHERE `username` = :name AND `password` = :password";
        $statement = $this->connect()->prepare($query);
        $statement->execute([
            'name' => $name,
            'password' => $password,
        ]);

        return $statement->fetch();
    }
}