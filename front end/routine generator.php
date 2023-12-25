<?php
    session_start();

    include("connection.php");
    include("functions.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>
        Workout Routine Generator
    </title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="routine generator.css">

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
                <li style="float:right"><a href="signup.php">Sign Up</a></li>
                <li style="float:right"><a href="login.php">Login</a></li>
            </ul>
        </div>

        <h2 style="text-align: center; margin-top: 10%;">Workout Routine Generator</h2>

        <button type="button" class="collapsible"> How to use the workout routine generator</button>
        <div class="content">
            <p>this is a test</p>
        </div>

        <div class="row">

            <div id="user_input" style="margin-bottom: 10%;">
                <h3 style="text-align: center;">Equipment</h3>
                <form method="post" name="routine_ui">
                    <label>Exercise Split Frequency (days):</label><br>
                    <input type="radio" id="2days" name="freq"> 2
                    <input type="radio" id="3days" name="freq"> 3
                    <br><br>

                    <label>Goal:</label><br>
                    <input type="radio" id="hype" name="goal" value="3x10-12"> Build Muscle
                    <input type="radio" id="str" name="goal" value="3x3-5"> Build Strength
                    <input type="radio" id="both" name="goal" value="3x8-10"> Build Muscle & Strength
                    <br><br>

                    <label>Equipment Available (Preset):</label><br>
                    <input type="radio" name="equipment" id="gym">Gym
                    <input type="radio" name="equipment" id="bw">Bodyweight

                    <hr color="black">

                    <label>Individual Equipment:</label>
                    <br>

                    <input type="checkbox" name="ind">Dumbbells/Kettlebells
                    <input type="checkbox" name="ind">Barbell
                    <input type="checkbox" name="ind">Squat rack
                    <input type="checkbox" name="ind">Pull up bar
                    <input type="checkbox" name="ind">Rings
                    <input type="checkbox" name="ind">Flat Bench
                    <input type="checkbox" name="ind">Adjustable bench
                    <input type="checkbox" name="ind">Resistance Bands
                    <br><br>

                    <div class="gen_btn">
                    <button type="button" id="generate" style="text-align:center" onclick="routine();">Generate
                    </button>
                    </div>

            </form>
            </div>
            
            <div id="routine_display">
                <h3 style="text-align: center">Your Sample Routine</h3>
            </div>
            
            
        </div>
    


        

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
        } //collapsible intro text

        window.onload = function(){//reset buttons on refresh
            routine_ui.reset();
        }
        
        /*function review_display(){
            var freq;
            if(document.getElementById('2days').checked){
                freq = 2
            } else if (document.getElementById('3days').checked){
                freq = 3
            } else if (document.getElementById('4days').checked){
                freq = 4
            }
            document.getElementById('routine_display').innerHTML += "Frequency: " + freq + " days a week" + "<br>";

            var goal;
            if(document.getElementById('hype').checked){
                goal = "Hypertrophy"
            } else if (document.getElementById('str').checked){
                goal = "Strength"
            } else if (document.getElementById('both').checked){
                goal = "Strength & Muscle"
            }
            document.getElementById('routine_display').innerHTML += "Goal: " + goal + "<br>" + "<br>";
        }*/

        function routine(){
            const str = ["Bench Press", "Squat" , "Overhead Press", "Bent Over Row"]
            if(document.getElementById('2days').checked){
                if(document.getElementById('gym').checked){
                    if(document.getElementById('hype').checked){
                        const hype = ["Hack Squats", "Romanian Deadlift", "Incline Dumbbell Press", "Shoulder Press", "Lat pulldown", "Bicep curl", "Tricep Pushdown"]
                        for(const exercise of hype){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById("hype").value + "<br>"
                        }
                    } else if (document.getElementById('str').checked){
                        for(const exercise of str){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById("str").value + "<br>"
                        }
                    } else if (document.getElementById('both').checked){
                        const both = ["Bench Press", "Squat", "Shoulder Press", "Romanian Deadlift"]
                        for (const exercise of both){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById("both").value + "<br>"
                        }
                    }
                }

                if(document.getElementById('bw').checked){
                    const hype = []
                        for(const exercise of hype){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById("hype").value + "<br>"
                        }
                    } else if (document.getElementById('str').checked){
                        const str = ["Pull ups", "Push ups", "Squats"]
                        for(const exercise of str){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById("str").value + "<br>"
                        }
                    } else if (document.getElementById('both').checked){
                        const both = ["Bench Press", "Squat", "Shoulder Press", "Romanian Deadlift"]
                        for (const exercise of both){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById("both").value + "<br>"
                        }
                }
            } else if(document.getElementById('3days').checked){
                if (document.getElementById('gym').checked){
                    if (document.getElementById('hype').checked){
                        const push = ["Incline Dumbbell Press", "Pec Dec", "Shoulder Press", "Lateral Raise", "Tricep Extensions"]
                        const pull = ["Machine Row", "Lat Pulldown", "Straight Arm Pulldown", "Bicep Curls"]
                        const legs = ["Hack Squats", "Leg Extensions", "Romanian Deadlift", "Lying Hamstring Curl"]
                        document.getElementById('routine_display').innerHTML += "Push Day:" + "<br>"
                        for (const exercise of push){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById('hype').value + "<br>"
                        }
                        document.getElementById('routine_display').innerHTML += "<br>"
                        document.getElementById('routine_display').innerHTML += "Pull Day:" + "<br>"
                        for (const exercise of pull){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById('hype').value + "<br>"
                        }
                        document.getElementById('routine_display').innerHTML += "<br>"
                        document.getElementById('routine_display').innerHTML += "Leg Day:" + "<br>"
                        for (const exercise of legs){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById('hype').value + "<br>"
                        }
                    } else if (document.getElementById('str').checked){
                        
                    } else if (document.getElementById('both').checked){

                    }

                }
            }

        }
    </script>


    <style>
        .gen_btn{
            text-align: center;
        }
    </style>

</body>

</html>