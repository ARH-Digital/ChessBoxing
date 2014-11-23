<?php
    // START SESSION and set VARIABLES
    session_start();
    $loggedIn = (isset($_SESSION['login'])!= "")? $_SESSION['login'] : null;
    $USER = (isset($_SESSION['user'])!= "")? $_SESSION['user'] : null;
?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Badger's Chess Boxing Club</title>
    <meta name="description" content="Chess Boxing - A sport for Brains and Brawns">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            padding-top: 50px;
            padding-bottom: 20px;
            /*background-image: url("img/dark_mosaic.png"); //www.subtlepatterns.com*/
            background-image: url("img/crossword.png"); //www.subtlepatterns.com
        }
        #cal th, td{
            text-align: center;
            height: 2em;
            background-color: white;
        }
        #cal td{
            width: 14%;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">B.C.B.C</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="champions.php">Champions</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
                
                <?php
                    // DISPLAYS LOG IN BAR IF NOT LOGGED IN
                    if(!$loggedIn){ 
                ?>
                <form class="navbar-form navbar-right" name="login" method="POST" action="login.php">
                    <div class="form-group">
                    <input type="text" placeholder="Username" class="form-control" name="user">
                    </div>
                    <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control" name="pass">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success">Log in</button>
                    </div>
                    <div class="form-group">
                    <a href="register.php"><button type="button" class="btn btn-danger">Register</button></a>
                    </div>
                </form>
                <?php
                    // DISPLAYS USERNAME GREETING IF LOGGED IN
                    }elseif($loggedIn == true){ 
                ?>
                <a class="navbar-right navbar-brand" href="logout.php">Welcome, <?=$USER?></a>
                <?php
                    }
                ?>
                
            </div><!--/.navbar-collapse -->
        </div>
    </nav> <!-- END of NAVBAR-->
    
<div class="container">
    
<?php
