<?php

$account = new Account();
$validator = new AccountValidator();
function sanitizeFormUsername($inputText)
{
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

function sanitizeFormPassword($inputText)
{
    $inputText = strip_tags($inputText);
    return $inputText;
}

function sanitizeFormString($inputText)

{
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    return $inputText;
}

if (isset($_POST['registerButton'])) {

    // * Sanitize
    $username = sanitizeFormUsername($_POST['username']);

    // * Validate
    $validator->username($username);


    //if all are successful then register
    $wasSuccesful = $validator->register($username);

}