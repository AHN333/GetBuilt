<?php
session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($connection);

    header("Refresh:5; url=forum home.php");

?>


<!DOCTYPE html>
<html>
<head>
    <title>
        You are logged in.
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
            <li><a href="homepage.html">About</a></li>
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

        <h1>You have successfully logged in.</h1>
        <h3>You will be redirected to the forums in 5 seconds.</h3>
        
</body>