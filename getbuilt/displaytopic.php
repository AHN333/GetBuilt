<?php
    $viewTopics = "SELECT topic_id, topic_subject, topic_content, topic_date, category_id, user_email 
    FROM topics
    WHERE category_id =" . $cat;
    $result_topic = mysqli_query($connection, $viewTopics);

    if (mysqli_num_rows($result_topic) == 0){
        echo 'There are no topics posted yet';
    } else {

        echo '<table id="topicTable" border="1">
        <tr>
        <th>Topic</th>
        <th>Created at</th>
        </tr>';

    while ($row = mysqli_fetch_assoc($result_topic)){
        echo '<tr>';
        echo '<td>';
        echo '<h3><a href="post.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h3>';
        echo '</td>';
        echo '<td>';
        echo date('m-d-Y', strtotime($row['topic_date']));
        echo '</td>';
        echo '</tr>';
        }

    }

?>