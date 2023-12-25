<?php
    include('navbarForum.php');
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $subject = $_POST['subject'];
        $message = $_POST['message'];
        

        $begin = "BEGIN WORK;";
        $beginQ = mysqli_query($connection, $begin);

        $topicid = mysqli_insert_id($connection);
        $cat_id = mysqli_real_escape_string($connection, $_GET['id']);

        if (!empty($subject) && !empty($message)){
            $topic_query = "INSERT INTO topics (topic_subject, topic_content, topic_date, category_id, user_email) 
                            VALUES('$subject', '$message', NOW(), '$cat', '$_SESSION[user_email]')";
            $result1 = mysqli_query($connection, $topic_query);

            $topicid = mysqli_insert_id($connection);
            $post_query = "INSERT INTO posts (post_content, post_date, topic_id, user_email) 
                            VALUES('$message', NOW(), '$topicid', '$_SESSION[user_email]') ";

            $result2 = mysqli_query($connection, $post_query);
            header($header);
            echo "Your topic has been posted!";
            
        } else{
            echo "Please fill in all fields";
        }
        $commit = "COMMIT;";
        $commitQ = mysqli_query($connection, $commit);
        echo ' <a href="post.php?id=' . $topicid . '">Click here to view</a>. <br>';

    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>
        questions forum
    </title>
    <link rel="stylesheet" href="forumTables.css">
    <link rel="stylesheet" href="forumCSS.css">
</head>
<body>

    <div class="form">
            <form method="POST" id="topicForm" action="" style="display: block;">
                Subject: <input type="text" id="subject" name="subject"/>
                <br><br>
                Message: <textarea name="message"></textarea>
                <input type="submit" value="Post Topic">
            </form>
    </div>
    
</body>

<style>
    textarea{
        width: 75%;
        height: 100px;
        font-size: large;
    }
    #subject{
        height: 25px;
        width: 30%;
        font-size: large;
    }
    .form{
        display: block;
        text-align: center;
    }
</style>
</html>