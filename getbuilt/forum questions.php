<?php
    include('navbarForum.php');
    $cat=1;
    include('displaytopic.php');
    
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
    <h2 style="text-align: center;">GetBuilt Forums</h2>

    <div class="topicButton" style="text-align: center;">
        <button type="button" onclick="showForm()" style="font-size: medium; ">New Topic</button>
    </div>

    <div class="bottom">
            <p>GetBuilt by Andy</p>
        </div>
        
</body>


<style>
textarea{
    width: 50%;
    height: 100%;
}
    
.form{
    display: none;
}

.bottom{
    padding: 10px;
    background-color: orange;
    width: 100%;
    text-align: center;
    position: absolute;
    bottom: 0;
    border-top: 2px solid black;
    }
</style>

<script>
    function showForm(){
        window.location.href="newTopicQ.php";
    }

</script>
</html>
