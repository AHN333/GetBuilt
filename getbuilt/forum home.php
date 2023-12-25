<?php
    include('navbarForum.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Forum Homepage
    </title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="forumTables.css">
</head>

<body>
    <h2 style="text-align: center;">GetBuilt Forums</h2>

        <div class="table">
        <table>
            <tr>
                <th>Category</th>
            </tr>
            <tr>
                <td><a href="forum questions.php">Questions</a></td>
            </tr>
            <tr>
                <td><a href="forum reviews.php">Reviews</a></td>
            </tr>
            <tr>
                <td><a href="forum discussion.php">General Discussion</a></td>
            </tr>
        </table>
        </div>

        <div class="bottom">
            <p>GetBuilt by Andy</p>
        </div>
        

<style>
    table{
        border-collapse: collapse;
        width: 75%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 5%;
        margin-bottom: 10%;
    }
    th{
        background-color: orange;
        color: black;
    }

    td{
        padding: 5px;
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
</body>