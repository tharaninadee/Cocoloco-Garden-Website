<?php
$msg = ''; // Initialize $msg to an empty string

if (isset($_GET['date'])) {
    $date = $_GET['date'];
}

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Fetch form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $catergoryname = $_POST['catergoryname'];
    $buffetname = $_POST['buffetname'];
    $num_packages = $_POST['num_packages']; // Added this line to fetch the number of packages

    // Connect to the database
    $mysqli = new mysqli('localhost', 'root', '', 'cocolocogarden');

    // Check if the entered email exists in the user_table
    $stmt = $mysqli->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        // Email exists in the user_table, check if the number of packages is more than 10
        if ($num_packages > 10) {
            // Number of packages is more than 10, allow form submission
            $stmt = $mysqli->prepare("INSERT INTO bookings (name, email, date,contact,catergoryname, buffetname, num_packages) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param('sssissi', $name, $email, $date,$contact,$catergoryname, $buffetname, $num_packages);

            // Execute the insert statement
            if ($stmt->execute()) {
                // Reservation submitted successfully, compose the email message
                $subject = "Reservation Booking";
                $message = "Reservation Name: $name\n";
                $message .= "Reservation Date: $date\n";
                $message .= "Contact Number: $contact\n";
                $message .= "User Email: $email\n";
                $message .= "Package Type: $catergoryname\n";
                $message .= "Buffet Type: $buffetname\n";
                $message .= "Number of Guests: $num_packages\n";

                // Your email addresses where you want to receive the form submissions
                $toUser = $email;
                $toAdmin = "lankaserene@gmail.com";

                // Additional headers for user email
                $headersUser = "From: $email\r\n";
                $headersUser .= "Reply-To: $email\r\n";

                // Additional headers for admin email
                $headersAdmin = "From: $email\r\n"; // You can modify this to a different sender if needed

                // Send the email to the user
                $successUser = mail($toUser, $subject, $message, $headersUser);

                // Send the email to the admin
                $successAdmin = mail($toAdmin, $subject, $message, $headersAdmin);

                // Check if both emails were sent successfully
                if ($successUser && $successAdmin) {
                    $msg = "<div class='alert alert-successmsg'>Reservation submitted successfully. We will contact you shortly.</div>";
                } else {
                    $msg = "<div class='alert alert-msg'>Error sending email. Please contact support.</div>";
                }
            } else {
                // Handle the case where the insert fails
                $msg = "<div class='alert alert-msg'>Error in booking. Please try again.</div>";
            }

            $stmt->close();
        } else {
            // Number of packages is not more than 10, show an error message
            $msg = "<div class='alert alert-msg'>Number of packages must be more than 10.</div>";
        }
    } else {
        // Email does not match any user, show an error message
        $msg = "<div class='alert alert-msg'>Invalid email. Booking not allowed.</div>";
    }

    $mysqli->close();
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Assest/styletable.css" rel="stylesheet">


    <title>Reservation Process</title>

    
   
</head>
<style>

/* Add these styles to change the background color of the input boxes */
.form-group {
    margin-bottom: 20px;
    margin-left: 300px;
    margin-right: 300px;
}

/* Adjust the label color if needed */
label {
    font-weight: bold;
    font-size: 15px;
    color: #8B4513;
    font-family: "Poppins", sans-serif;
}


.container {
    margin-top: 50px;
    height:auto;
    width:1500px;
    margin-left: auto;
    margin-right: auto;
   
}

.DateHeading {
    text-align: center;
    font-weight:bold;
    font-family: "Poppins", sans-serif;
    font-size: 25px;
    color: #556B2F;
}

.row {
    margin: 0 auto;
    
}


.form-group {
    margin-bottom: 20px;
    margin-left: 300px;
    margin-right: 300px;
    
}

.form-control {
    width: 100%;
    padding: 10px;
    box-sizing: border-box color:black;

}

select.form-control {
    height: 38px;
}

.alert {
    margin-top: 20px;
}

.btn-reserve {
    background-color: #8B4513; 
    color: #FFF;
    padding: 10px 20px;
    font-size: 16px;
    font-family: "Poppins", sans-serif;
    cursor: pointer;
    
}

.btn:hover{
        background-color:#556B2F;
        cursor:pointer;
    }

.btn-goback{
    background-color: #C2DDB5; /* Light coral background color for 'N/A' button */
    color: black;
    align:right;
    padding: 10px 20px;
    margin-left:1100px;
    font-weight:bold;
    font-size:16px;
    font-family: "Poppins", sans-serif;
}

.alert-successmsg{
    background-color: darkolivegreen; 
    color: #FFF;
}
.alert-msg{
    background-color: crimson; 
    color: #FFF;
    padding: 10px 20px;
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

<body>


<div class="topic">Make Reservation for your Day Outing <button class="greenbutton" style="margin-bottom:10px; margin-left:300px;" onclick="goBack()">Back</button>
<button class="greenbutton" style="margin-bottom:10px;" onclick="location.href='#'">Sign Out</button></div>

<div class="container">
        <h1 class="DateHeading">Book for a Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
        <div class="row">
                <?php echo $msg; ?>
                
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                    <label for="">Customer Name</label>
                    <input type="text" class="form-control" name="name" pattern="[A-Za-z ]+" title="Only letters and spaces are allowed" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email Address</label>
                        <input type="email" class="form-control" name="email"title="Please enter your registerd email address" required>
                    </div>
                    <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" pattern="[0-9]+" title="Please enter only numbers" class="form-control" name="contact" required>
                </div>


                 
                
                    <?php
                            require("../Admin/conf.php");

                            $query = "SELECT ImageId, catergoryname FROM packagecater";
                            $result = mysqli_query($conn, $query);

                            // Check if there are rows in the result
                            if (mysqli_num_rows($result) > 0) {
                                // Start the dropdown
                                echo '<div class="form-group">';
                                echo '<label for="PackageType"> PACKAGE TYPE </label>';
                                echo '<select class="form-control" id="catergoryname" name="catergoryname" required>';

                                // Iterate through the result and create options
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['catergoryname'] . '">' . $row['catergoryname'] . '</option>';
                                }

                                // Close the dropdown
                                echo '</select>';
                                echo '</div>';
                            } else {
                                echo '<p>No Package types available.</p>';
                            }

                            // Close the database connection
                            mysqli_close($conn);
                        ?>


                        <?php
                            require("../Admin/conf.php");

                            $query = "SELECT ImageId, buffetname FROM buffet";
                            $result = mysqli_query($conn, $query);

                            // Check if there are rows in the result
                            if (mysqli_num_rows($result) > 0) {
                                // Start the dropdown
                                echo '<div class="form-group">';
                                echo '<label for="buffetType"> BUFFET TYPE (Choose any buffet type)</label>';
                                echo '<select class="form-control" id="buffetname" name="buffetname" required>';

                                // Iterate through the result and create options
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['buffetname'] . '">' . $row['buffetname'] . '</option>';
                                }

                                // Close the dropdown
                                echo '</select>';
                                echo '</div>';
                            } else {
                                echo '<p>No buffet types available.</p>';
                            }

                            // Close the database connection
                            mysqli_close($conn);
                        ?>



                        <div class="form-group">
                    <label for="">Number of guests (more than 10)</label>
                    <input type="number" class="form-control" name="num_packages" id="num_packages" required>
        
                    </div>


                   <center> <button class="btn btn-reserve" type="submit" name="submit">Submit</button></center>

                   
                </form>
            </div>
        </div>
    </div>
    <div><?php include("calandcondition.php"); ?></div>
<br><br>
    <?php include ("footer2.php") ?>
    <script>
        function goBack() {
            // Specify the relevant PHP page
            var phpPage = 'Calender.php';
            
            // Navigate to the PHP page
            window.location.href = phpPage;
        }
    </script>
     <script src="../Assest/bootstrap.bundle.min.js"></script>
   
</body>
</html>
   
   
    

   


  

