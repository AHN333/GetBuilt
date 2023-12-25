<?php
session_start();

    include("connection.php");
    include("functions.php");

    
?>



<!DOCTYPE html>
<html>
<head>
    <title>
        GetBuilt Homepage
    </title>
    <link rel="stylesheet" href="navbar.css">
</head>

<body>

    <div class="header">
        <h1>
            GetBuilt
        </h1>
        <p>
            By Andy
        </p>

    </div>
        <div class="navbar">
            <ul>
                <li><a href="homepage.php">About</a></li>
                <li><a href="routine generator.php">Routine Generator</a></li>
                <li><a href="forum home.php">Forums</a></li>
                <?php if (isset($_SESSION['user_id'])):?>
                    <li style="float:right"><a href="logout.php">Logout</a>
                <?php else: ?>
                    <li style="float:right"><a href="signup.php">Sign Up</a></li>
                    <li style="float:right"><a href="login.php">Login</a></li>
                <?php endif; ?>
                
            </ul>
        </div>

        <div class="welcome">
            <p>Welcome to GetBuilt by Andy...</p>
        </div>

        <div class="vid">
            <center>
            <video width="540" height="1000" muted autoplay loop>
                <source src="squat.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </center>
        </div>
</body>

</html>

<style>
    .welcome{
        text-align: center;
        margin: 10%;
        font-size: 18px;
    }

    .vid {
        width: 100%;
        height: 50%;
    }
</style>
