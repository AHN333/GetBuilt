<?php
    session_start();

    include("connection.php");
    include("functions.php");
    $user_data = check_login($connection);
?>


<!DOCTYPE html>

<html>
<head>
    <title>GetBuilt Forums</title>
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
                <?php if (isset($_SESSION['user_email'])):?>
                    <li style="float:right"><a href="logout.php">Logout</a>
                <?php else: ?>
                    <li style="float:right"><a href="signup.php">Sign Up</a></li>
                    <li style="float:right"><a href="login.php">Login</a></li>
                <?php endif; ?>
                
            </ul>
        </div>
</body>
</html>