<?php

    // START SESSION and set VARIABLES
    session_start();
    $page = $_SERVER['HTTP_REFERER'];
    
    // IF LOGGED IN, REMOVE DETAILS
    if(isset($_SESSION['login']))
    {
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['user']))
    {
        unset($_SESSION['user']);
    }

    // FUNCTION TO CHANGE PAGE
    function redirect($url)
        {
            header("Location: $url");
            die();
        }

    // REDIRECT TO PAGE USER WAS ON
    redirect($page);
