<?php
    include('navbar.php');
    
?>



<!DOCTYPE html>
<html>
<head>
    <title>
        GetBuilt Homepage
    </title>
    <link rel="stylesheet" href="navbar.css">
</head>

<body>

        <div class="welcome">
            <p style="font-size: 35px;">Welcome to GetBuilt by Andy!</p>
            <p>This is my personal fitness website where you can you the FREE online workout routine generator and discussion forums!</p>
        </div>
        <

        <div class="vid">
            <center>
            <video width="540" height="1000" muted autoplay loop>
                <source src="squat2.0.mp4" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
        </center>
        <div class="caption">
            <p>"Why should I follow this guy?"</p>
            <p>How many people do you personally know moving <span style="font-size: 25px; font-weight:bold;">400+ lbs of pure steel?</span></p>
        </div>
        </div>

        <div class="bottom">
            <p>GetBuilt by Andy</p>
        </div>
        
</body>

</html>

<style>
    .welcome{
        text-align: center;
        margin-top: 10%;
        margin-bottom: auto;
        font-size: 25px;

    }

    .vid {
        width: 100%;
        height: 50%;
        padding: 0%;
    }

    .caption{
        text-align: center;
        font-size: 20px;
        margin-bottom: 5%;
    }

    
    .bottom{
        padding: 10px;
        background-color: orange;
        width: 100%;
        text-align: center;
        border-top: 2px solid black;
    }
</style>
