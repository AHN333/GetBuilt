<?php 
session_start();
    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $user_password = $_POST['password'];

        if(!empty($user_name) && !empty($user_password))
        {
            //read info from db
            $query = "select * from users limit 1";

            $result = mysqli_query($connection, $query);

            if($result){
                if ($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['user_password'] === $user_password){
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: loginsuccess.php");
                    die;
                }
            }
        }

            echo "Wrong username or password.";
        }else{
            echo "Wrong username or password.";
        }

    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="navbar.css">


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
            background-color: orange;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>


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
        <h2>Login</h2>
        <form method="post">
            <label>Username</label><br>
            <input type="text" name="user_name">
            <br><br>
            <label>Password</label><br>
            <input type="password" name="password">
            <br><br>
            <input type="submit" value="Login"><br>


            <label>New user?</label>
            <a href="signup.php">Sign Up Here</a>
            <br>
            <label>Forgot Your Password?</label>
            <a href="passreset.php">Reset Password Here</a>

        </form>
    </div>


</body>

</html>