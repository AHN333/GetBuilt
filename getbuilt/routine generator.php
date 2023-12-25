<?php
    include('navbar.php')
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
        <h2 style="text-align: center; margin-top: 10%;">Workout Routine Generator</h2>

        <button type="button" class="collapsible" style="font-size: 18px;">Click Here for Workout Routine Generator instructions</button>
        <div class="content">
            <div class="instructions" style="font-size: 18px;">
                <p>Step 1: Select how many days a week you plan on working out.</p><br>
                <p>Step 2: Select your fitness goal.</p><br>
                <p>Step 3: Select your available equipment.</p><br>
                <p>Step 4: Refresh the page to generate a new routine</p><br>
                <p>*Only 1 routine available for bodyweight</p>
            </div>
        </div>

        <div class="row">

            <div id="user_input" style="margin-bottom: 10%;">
                <h3 style="text-align: center; font-size: 20px;">Equipment</h3>
                <form method="post" name="routine_ui" style="font-size: 17px;">
                    <label>Exercise Split Frequency (days):</label><br>
                    <input type="radio" id="2days" name="freq" onchange="disableBtns()"> 2
                    <input type="radio" id="3days" name="freq" onchange="disableBtns()"> 3
                    <br><br>

                    <label>Goal:</label><br>
                    <input type="radio" id="hype" name="goal" value="3x10-12"> Build Muscle
                    <input type="radio" id="str" name="goal" value="3x3-5"> Build Strength
                    <input type="radio" id="both" name="goal" value="3x8-10"> Build Muscle & Strength
                    <br><br>

                    <label>Equipment Available (Preset):</label><br>
                    <input type="radio" name="equipment" id="gym">Gym
                    <input type="radio" name="equipment" id="bw">Bodyweight

                    <div class="gen_btn">
                    <button type="button" id="generate" style="text-align:center" onclick="routine();">Generate
                    </button>

                
                    </div>

            </form>
            </div>
            
            <div id="routine_display" style="font-size: 20px; margin-bottom: 5%;">
                <h3 style="text-align: center">Your Sample Routine</h3>
            </div>
            
            
        </div>
    

        <div class="bottom">
            <p>GetBuilt by Andy</p>
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
    

        function routine(){
            const str = ["Bench Press", "Squat" , "Overhead Press", "Bent Over Row"]
            //2 DAYS
            if(document.getElementById('2days').checked){
                
                if(document.getElementById('gym').checked){
                    //2 GYM HYPE
                    if(document.getElementById('hype').checked){
                        const hype = ["Hack Squats", "Romanian Deadlift", "Incline Dumbbell Press", "Shoulder Press", "Lat pulldown", "Bicep curl", "Tricep Pushdown"]
                        for(const exercise of hype){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById("hype").value + "<br>"
                        }
                        //2 GYM STR
                    } else if (document.getElementById('str').checked){
                        for (const exercise of str){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById('str').value + "<br>"
                        }
                        //2 GYM BOTH
                    } else if (document.getElementById('both').checked){
                        const both = ["Bench Press", "Squat", "Shoulder Press", "Romanian Deadlift"]
                        for (const exercise of both){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById("both").value + "<br>"
                        }
                    }
                }

                //3 DAYS
            } else if(document.getElementById('3days').checked){
                if (document.getElementById('gym').checked){
                    //3 GYM HYPERTROPHY
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

                    //3 GYM STRENGTH
                    } else if (document.getElementById('str').checked){
                        for (const exercise of str){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById('str').value + "<br>"
                        }

                    //3 GYM BOTH
                    } else if (document.getElementById('both').checked){
                        const push = ["Bench Press", "Incline Dumbbell Press", "Pec Dec", "Shoulder Press", "Lateral Raise", "Tricep Extensions"]
                        const pull = ["Machine Row", "Lat Pulldown", "Straight Arm Pulldown", "Bicep Curls"]
                        const legs = ["Barbell Squats", "Hack Squats", "Leg Extensions", "Romanian Deadlift", "Lying Hamstring Curl"]
                        document.getElementById('routine_display').innerHTML += "Push Day:" + "<br>"
                        for (const exercise of push){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById('both').value + "<br>"
                            }
                        document.getElementById('routine_display').innerHTML += "<br>"
                        document.getElementById('routine_display').innerHTML += "Pull Day:" + "<br>"
                        for (const exercise of pull){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById('both').value + "<br>"
                        }
                        document.getElementById('routine_display').innerHTML += "<br>"
                        document.getElementById('routine_display').innerHTML += "Leg Day:" + "<br>"
                        for (const exercise of legs){
                            document.getElementById('routine_display').innerHTML += exercise + " " + document.getElementById('both').value + "<br>"
                        }
                        
                    }
                }//end gym
            }
            if (document.getElementById('bw').checked){
                    const push = ["Push ups", "Dips"]
                    const pull = ["Pull ups", "Inverted rows"]
                    const legs = ["Squats", "Lunges"]
                    for (const exercise of push){
                        document.getElementById('routine_display').innerHTML += exercise + " " + "3x10-20" + "<br>"
                    }
                    for (const exercise of pull){
                        document.getElementById('routine_display').innerHTML += exercise + " " + "3x10-20" + "<br>"
                    }
                    for (const exercise of legs){
                        document.getElementById('routine_display').innerHTML += exercise + " " + "3x10-20" + "<br>"
                    }

                }
                
        }//end routine function

    </script>


    <style>
        .gen_btn{
            text-align: center;
        }
        
        .bottom{
            padding: 10px;
            background-color: orange;
            width: 100%;
            text-align: center;
            border-top: 2px solid black;
        }
        </style>

</body>

</html>