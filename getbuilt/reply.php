<?php
    include('navbarForum.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $content = $_POST['reply'];
        $id = mysqli_real_escape_string($connection, $_GET['id']);

        if (!empty($content)){
            $reply_query = "INSERT INTO posts (post_content, post_date, topic_id, user_email) 
                            VALUES('$content', NOW(), '$id', '$_SESSION[user_email]')";
            $result = mysqli_query($connection, $reply_query);
        } else {
            header("Location: post.php?id=" .$id);
            echo "Please fill in the reply field";
        }

        if($result){
            echo 'Reply successfully posted. <a href="post.php?id=' . htmlentities($_GET['id']) . '">Click Here to View</a>';
        } else {
            header("Location: post.php?id=" .$id);
        }
    }




?>