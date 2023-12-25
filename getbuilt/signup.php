<?php
    include('navbar.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $user_password = $_POST['password'];
        $user_email = $_POST['email'];

        if(!empty($user_email) && !empty($user_name) && !empty($user_password))
        {
            //check dup email & username
            $dup_email_query = "select * from users where user_email = '$user_email'";
            $dup_email = mysqli_query($connection, $dup_email_query);

            $dup_username_query = "select * from users where user_name = '$user_name'";
            $dup_username = mysqli_query($connection, $dup_username_query);

            if (mysqli_num_rows($dup_email)>0){
                echo "This email address has already been used.";
            } elseif(mysqli_num_rows($dup_username)>0){
                echo "This username has already been taken.";
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



        <button type="button" class="collapsible"> Why sign up?</button>
    <div class="content">
        <p style="font-size: 20px;">Signing up grants access to viewing and posting onto the forums.</p>
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
            <!--<label>Forgot Your Password?</label>
            <a href="passreset.php">Reset Password Here</a>-->

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
            background-color: lightsalmon;
            margin: auto;
            width: 300px;
            padding: 20px;
        }

        .collapsible{
            background-color: aqua;
            cursor: pointer;
            width: 100%;
            border: none;
            text-align: left;
            font-size: 100%;
            margin-top: 2%;
        }

        .active, .collapsible:hover {
            background-color: orange;
        }

        .content {
            overflow: hidden;
            padding: 0 15px;
            max-height: 0;
            transition: max-height 0.2s ease-out;
            background-color: green;
            margin-bottom: 2%;
        }
    </style>

<script>
        var collapse = document.getElementsByClassName("collapsible");
        var i;

        for (i=0; i < collapse.length; i++){ 
            collapse[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                }
                else {
                    content.style.maxHeight = content.scrollHeight + "px";
                }
            });
        } 
</script>
</body>



</html>