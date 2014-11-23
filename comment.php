<?php

    
    session_start();
    $user = (isset($_SESSION['user'])!= "")? $_SESSION['user'] : null;
    $comment = (isset($_POST['comment'])!= "")? $_POST['comment'] : null;
    $time = date("H:i:s d-m-y");
    $date = date();
    
    $file = "data/comments.blog";
    
    $fh = fopen($file, "r");
    $data = fread($fh, filesize($file));
    fclose($fh);
    
    $handle = fopen($file, "w");

    fwrite($handle, "$user"."_##_"."$comment"."_##_"."$time"."#__#"."$data");
    
    fclose($handle);
    
    // FUNCTION TO CHANGE PAGE
    function redirect($url)
    {
        header("Location: $url");
        die();
    }
    
    redirect("blog.php#comments");