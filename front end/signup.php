<?php
session_start();
    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $user_password = $_POST['password'];
        $user_email = $_POST['email'];

        if(!empty($user_email) && !empty($user_name) && !empty($user_password))
        {
            //check dup email
            $dup_email = "select * from users where user_email = '$user_email'";
            $result = mysqli_query($connection, $dup_email);

            if (mysqli_num_rows($result)>0){
                echo "This email address has already been used.";
            }else{
                //save info to db
                $query = "insert into users (user_email, user_name, user_password) values('$user_email', '$user_name', '$user_password')";

                mysqli_query($connection, $query);


                header("Location: login.php");
                die;
            }

        }else{
            echo "Please fill in all fields.";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
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

    <div id="box">
        <h2>Sign Up</h2>
        <form method="post">
            <label>Email Address</label><br>
            <input type="email" name="email">
            <br><br>
            <label>Username</label><br>
            <input type="text" name="user_name">
            <br><br>
            <label>Password</label><br>
            <input type="password" name="password">
            <br><br>
            <input type="submit" value="Register"><br>


            <label>Have an account?</label>
            <a href="login.php">Login Here</a>
            <br>
            <label>Forgot Your Password?</label>
            <a href="passreset.php">Reset Password Here</a>

        </form>
    </div>



    <style type="text/css">
        
        #text{
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin orange;
        }

        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color: blue;
            border: none;
        }

        #box{
            background-color: plum;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>
</body>

</html>