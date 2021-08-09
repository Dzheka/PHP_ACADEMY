<?php


class AccountValidator
{
    /**
     * @var array
     */
    private $errorArray;

    public function __construct()
    {
        $this->errorArray = array();

    }
    
    public function getError(string $attribute)
    {
        if (in_array($attribute, $this->errorArray))
            return ValidatorMessageConstants::MESSAGES[$attribute];
        return "";
    }

    public function getErrors()
    {
        return $this->errorArray;
    }

    public function validateUsername($username)
    {
        if (strlen(utf8_decode($username)) > 25 || strlen(utf8_decode($username)) <= 2) {
            array_push($this->errorArray, "username");
        }
    }

    private function validateEmails($em)
    {

    }

    private function validatePassword($pw, $pw2)
    {
        if ($pw != $pw2) {
            array_push($this->errorArray, 'Ваш пароль не совпадает');
            return ($pw);
        }
    }
}