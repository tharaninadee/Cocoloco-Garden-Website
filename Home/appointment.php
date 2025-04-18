<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Assest/styletable.css" rel="stylesheet">
    
    <title>Appoinment</title>
    <style>
       

        .row {
            display: flex;
            justify-content: center; /* Center the columns horizontally */
        }

        .col-md-2 {
            width: 20%; /* Set a fixed width for each column */
            box-sizing: border-box; /* Include padding and border in the total width */
            margin: 0 100px;
        }

        .photo-btn a {
            text-decoration: none;
            color: #fff;
        }
    

        .photo-box {
            position: relative;
        overflow: hidden;
        width: 220px;
        height: 250px;
        border-radius: 20px;
        background-color: #C2DDB5;
        margin-top:50px;
            
        }

        .photo-box img {
            width: 100%;
        height: 50%;
        border-radius: 20px;
       
        margin-bottom: 10px;
        }

        .photo-box h2 {
            font-family: "Poppins", sans-serif;
            font-size: 25px;
            color: brown;
            text-align: center;
            margin-top: 10px;
        }

        .photo-btn {
        font-size: 15px;
        position: absolute;
        bottom: 10px;
        background: green;
        color: white; /* Set font color to white */
        display: inline-block;
        margin-top: 10px;
        margin-left:60px;
        weight:600px;
        height:30px;
}
.mainpara{
    font-family: "Poppins", sans-serif;
        font-size: 16px;
        text-align: center;
        color: dark brown;
        border: 2px solid green;     
}

.mainhead {
        color: #556B2F;
        font-family: "Poppins", sans-serif;
        font-weight: bold;
        font-size: 30px;
    }
    .greenbutton {
            background-color: #637f32 ;
            padding: 0.75rem 1.5rem;
            outline: none;
            border: none;
            font-size: 1rem;
            font-weight: 500;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
 

        .greenbutton:hover {
        background-color:  #4C622C;
        color: white;
        border: 1px solid white;
        }
    </style>
</head>
<body>

    <?php require("../Admin/conf.php"); ?>
    
    <div class="topic"><img class="coco" width="80" height="50" style="margin-right:100px;margin-left:30px;" role="img" src="../Image/loco.png">PLAN YOUR DAY WITH US
<button class="greenbutton"style="margin-bottom:10px; margin-left:600px;"onclick="goBack('index.php')"><-<-GO BACK</button>
</div>  <br><br>

<div class="container mt-5">

    <center> <div class="mainhead">MAKE A TIME SLOT FOR PLAN YOUR DAY</div></center><br><br>
    <div class="containers">
    <div class="mainpara"><br>
Now you can join with cocoloco for planning your special days of wedding, birthday party,special event through zoom call 
or physical meeting. We have offer you two time slot for make a friendly discussion. <br><br>
</div>
</div>
</div>

<div class="container mt-5">
    <main>
        <div class="row">
            <div class="col-md-2">
                <div class="photo-box">
                    <img src="../Image/wedding.jpg" alt="Wedding Images">
                    <h2>11.00am - 12.00pm</h2>
                    <button class="photo-btn"><a href="appointcalender1.php">Book Date</a></button>
                </div>
            </div>

            <div class="col-md-2">
                <div class="photo-box">
                    <img src="../Image/coco3.jpeg" alt="Birthday Party Images">
                    <h2>3.00pm - 4.00pm</h2>
                    <button class="photo-btn"><a href="appointcalender2.php">Book Date</a></button>
                </div>
            </div>
        </div>
</div>


<script>
    function goBack(phpPage) {
        // Navigate to the specified PHP page
        window.location.href = phpPage;
    }
</script>           

</body>
<br>
<?php include("footer2.php"); ?>
</html>


   

