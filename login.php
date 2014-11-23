<?php

    // START SESSION and set VARIABLES
    session_start();
    $user = ($_POST['user']!= "")? $_POST['user'] : null;
    $pass = ($_POST['pass']!= "")? $_POST['pass'] : null;
    $_SESSION['login'] = false;
    $page = $_SERVER['HTTP_REFERER'];
   
    // FUNCTION TO CHANGE PAGE
    function redirect($url)
    {
        header("Location: $url");
        die();
    }
    
    //FILE OPERATIONS
    $file = "data/login.details";
    $fh = fopen($file, "r");
    
    while($line = fgets($fh))
    {
        $details = explode("_##_", $line);
        if(($details[0] == $user) && ($details[1] == $pass))
        {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            redirect($page);
            break;
        }
    }
    redirect("register.php");
