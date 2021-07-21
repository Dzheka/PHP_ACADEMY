<?php


class UserValidator
{
    private array $data;
    private array $errors = [];
    private array $test = ['username', 'password'];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function validate(): array
    {

        $this->validateUsername();
        $this->validatePassword();

        if (key_exists('email', $this->data)){
            $this->validateEmail();
        }
        return $this->errors;
    }

    private function validateUsername()
    {
        $value = trim($this->data['name']);

        if (empty($value)){
            $this->addError('name', 'username cannot be empty');
        }  else {
            if (!preg_match('/^[a-zA-Z0-9]{4,12}$/', $value)) {
                $this->addError('name', 'Username must be 4-12 chars and alphanumeric');
            }
        }
    }


    private function validatePassword()
    {
        $value = trim($this->data['password']);

        if (empty($value)){
            $this->addError('password', 'password cannot be empty');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{4,12}$/', $value)) {
                $this->addError('password', 'Password must be 4-12 chars and alphanumeric');
            }
        }
    }

    private function validateEmail()
    {
        $value = trim($this->data['email']);

        if (empty($value)){
            $this->addError('email', 'email cannot be empty');
        } else {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Email must be a valid email');
            }
        }
    }

    private function addError($key, $value)
    {
        $this->errors[$key] = $value;
    }

}
