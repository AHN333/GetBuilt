<?php

function check_login($connection)
{
    if(isset($_SESSION['user_email']))
    {
        $id = $_SESSION['user_email'];
        $query = "select * from users where user_email = '$id' limit 1";

        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

