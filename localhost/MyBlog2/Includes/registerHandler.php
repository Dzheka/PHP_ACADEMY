<?php


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

if (!empty($_POST['registerButton'])) {
    //register button was pressed
    $username = sanitizeFormUsername($_POST['username']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);
    $email = sanitizeFormString($_POST['email']);
$account = new account();
    $wasSuccesful = $account->register($username,$password,$password2,$email);

    if ($wasSuccesful==true){
        header("Location:index.php");
    }

}

