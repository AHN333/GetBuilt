<?php
    include('navbarForum.php');

    $topic = "SELECT topic_id, topic_subject 
                FROM topics
                WHERE topic_id =" . mysqli_real_escape_string($connection, $_GET['id']);
    $result = mysqli_query($connection, $topic);

    while ($row = mysqli_fetch_assoc($result)){
        echo '<table class = "topic" border = "1">
        <tr>
        <th colspan ="2">' . $row['topic_subject'] . '</th>
        </tr>';

        $post = "SELECT 
        posts.topic_id,
        posts.post_content,
        posts.post_date,
        posts.user_email,
        users.user_email,
        users.user_name
        FROM posts
        LEFT JOIN users
        ON posts.user_email = users.user_email
        WHERE posts.topic_id =" . mysqli_real_escape_string($connection, $_GET['id']);

        $result_post = mysqli_query($connection, $post);

        while ($postView = mysqli_fetch_assoc($result_post)){
            echo '<tr class="topicPost">';
            echo '<td class="userName">';
            echo $postView['user_name'] . '<br>' . date('m-d-Y h:i', strtotime(($postView['post_date'])));
            echo '</td>';
            echo '<td class="postContent">' . htmlentities((stripslashes($postView['post_content'])));
            echo '</td>';
            echo '</tr>';
        }
        
        //reply
        echo '<tr><td colspan="2"><h3>Reply:</h3><br />
					<form method="post" action="reply.php?id=' . $row['topic_id'] . '">
						<textarea name="reply"></textarea><br /><br />
						<input type="submit" value="Submit reply" />
					</form></td></tr>';
        echo '</table>';

        
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>post</title>
    <link rel="stylesheet" href="forumCSS.css">
</head>
<body>


</body>

<style>
    textarea{
        width: 80%;
        height: 75px;
    }
</style>
</html>