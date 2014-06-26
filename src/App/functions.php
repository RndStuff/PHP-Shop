<?php

function validateEmail($email)
{
    $pattern = "/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/";
    return (bool) preg_match($pattern, $email);
}