<?php
if (isset($_GET['date'])) {
    $date = $_GET['date'];
}

// Initialize $msg to an empty string
$msg = '';

// Check if form is submitted

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Fetch form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event = $_POST['event'];
    $contact = $_POST['contact'];
    $time = $_POST['time'];
    $description = $_POST['description']; // Corrected variable name

    // Connect to the database
    $mysqli = new mysqli('localhost', 'root', '', 'cocolocogarden');
    
    // Check the connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO appointment(name, email, event, contact, time, description, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssiss', $name, $email, $event, $contact, $time, $description, $date);

    // Execute the insert statement
    if ($stmt->execute()) {
        $msg = "<div class='alert alert-successmsg'>Booking Successful</div>";
        
        // Compose the email message

    $stmt->close();
    $mysqli->close();
}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="../Assest/styletable.css" rel="stylesheet">
    <link href="../Assest/styles.css" rel="stylesheet">
    
    <title>Appointment Booking</title>
    <style>
     

        .background-container {
            background-image: url('../Image/Background.jpeg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin-left: 150px; 
            margin-right: 150px; 
            margin-top: 50px; 
            border-radius: 10px; 
            overflow: hidden; 
        }
        .container {
            max-width: 600px;
            margin-top:50px;
            margin-bottom:50px;
            margin-left:250px;
            background-color: #fbf9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }
          
        form {
            display: flex;
            flex-direction: column;
          }
          
        .event {
            padding: 8px;
            font-size: 14px;
            margin-bottom: 10px;
          }
          
        label {
            font-weight: bold;
            font-size: 20px;
            color: #8B4513;
            font-family: "Poppins", sans-serif;
          }
          
        input {
            padding: 10px;
            margin-bottom: 10px;
          }
          
        .textarea {
            margin-bottom: 16px;
          }
        .DateHeading {
            text-align: center;
            font-weight:bold;
            font-family: "Poppins", sans-serif;
            font-size: 25px;
            color: #556B2F;
        }
        .greenbutton {
            background-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            outline: none;
            border: none;
            font-size: 1rem;
            font-weight: 500;
            color: var(--white);
            background-color: var(--primary-color);
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
 

        .greenbutton:hover {
            background-color: var(--primary-color-dark);
        color: white;
        border: 1px solid var(--white);
        }
    </style>
</head>

<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event = $_POST['event'];
    $contact = $_POST['contact'];
    $time = $_POST['time'];
    $description = $_POST['description']; // Corrected variable name

    // Compose the email message
    $subject = "Appointment Reservation for Planning";
    $message = "Reservation Name: $name\n";
    $message .= "Reservation Date: $date\n";
    $message .= "Contact Number: $contact\n";
    $message .= "User Email: $email\n";
    $message .= "User Message: $description\n";
    $message .= "User Message: $event\n";
    $message .= "User Message: $time\n";

    // Your email addresses where you want to receive the form submissions
    $toUser = $email;
    $toAdmin = "cocolocogarden123@gmail.com";

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
        $msg = "Reservation submitted successfully. We will contact you shortly.";
    } else {
        $msg = "Error submitting reservation. Please try again later.";
    }
}
?>

    <div class="topic">MAKE RESERVATION - TIME SLOT (11.00AM - 12.00PM)<button class="greenbutton" style="margin-bottom:10px; margin-left:500px;" onclick="goBack()"><-<-GO BACK</button></div>
  <div class="background-container"> 
    <div class="container">
        <h1 class="DateHeading">BOOK FOR DATE: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
        <div class="row">
            <?php echo $msg; ?>
            <form action="" method="post" autocomplete="off">
                <label for="name">NAME:</label>
                <input type="text" id="name" name="name" required />

                <label for="email">EMAIL:</label>
                <input type="email" id="email" name="email" required />

                <label for="event">SELECT AN EVENT:</label>
                <select id="event" name="event" class="event"> 
                    <option value="Wedding">Birthday Event</option>
                    <option value="Birthday">Wedding Event</option>
                    <option value="Special">Special Event</option>
                    <option value="Other">Other Event</option>
                </select>

                <label for="contact">CONTACT:</label>
                <input type="text" id="contact" name="contact" required /> 

                <label for="time">TIME SLOT:</label>
                <select id="time" name="time" class="time"> <!-- Corrected name attribute -->
                    <option value="11.00am - 12.00pm">11.00am - 12.00pm</option>
                </select>

                <label for="description">MESSAGE:</label> 
                <textarea class="textarea" id="description" name="description" rows="4" cols="50"></textarea>

                <center> <button class="btn btn-brown" type="submit" name="submit">Submit</button></center>
            </form>
        </div>
    </div>
    </div>



    <script>
        function goBack() {
            // Specify the relevant PHP page
            var phpPage = 'appointcalender1.php';
            
            // Navigate to the PHP page
            window.location.href = phpPage;
        }
    </script>
</body>
<?php include("footer2.php"); ?>
</html>