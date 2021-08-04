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

if (isset($_POST['loginButton'])) {
    //login button was pressed

}
if (isset($_POST['registerButton'])) {
    //register button was pressed
    $username = sanitizeFormUsername($_POST['username']);
    $username = sanitizeFormPassword($_POST['password']);
    $username = sanitizeFormPassword($_POST['password2']);
    $username = sanitizeFormString($_POST['email']);
}

