<?php
    class account{
        /**
         * @var array
         */
        private $errorArray;

        public function __construct(){
            $this->errorArray=array();

        }
        public function register($un,$em,$pw,$pw2){
            $this->validateUsername($un);
            $this->validateEmails($em);
            $this->validatePassword($pw, $pw2);

            if(empty($this->errorArray) == true){
                return true;
            }
            else{
                return false;
            }
        }
        public function getError($error){
            if(!in_array($error, $this->errorArray)){
                $error="";
            }
            return ($error);
        }
        public function validateUsername($un){
            if(strlen(utf8_decode($un)) > 25 || strlen (utf8_decode($un)) < 2){
                array_push($this->errorArray,constants::$usernameCharacters);
                return($un);
            }
        }
        private function validateEmails($em){

        }
        private function validatePassword($pw, $pw2){
            if ($pw != $pw2){
                array_push($this->errorArray,'Ваш пароль не совпадает');
                return($pw);
            }
        }
    }