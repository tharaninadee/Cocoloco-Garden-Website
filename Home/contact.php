<?php
if (isset($_POST["submit"])) {
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $conn = new mysqli('localhost', 'root', '', 'cocolocogarden');

    $errors = array();

    if (empty($fullName) || empty($email) || empty($contact) || empty($subject) || empty($message)) {
        $errors['all_fields'] = "All fields are required";
    }

    if (count($errors) > 0) {
        foreach ($errors as  $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        $sql = "INSERT INTO message_table (fullname, email, contact, subject, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "ssiss", $fullName, $email, $contact, $subject, $message);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>Your message has been submitted successfully.</div>";
        } else {
            die("Something went wrong");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../Assest/bootstrap.min.css">
        <link rel="stylesheet" href="../Assest/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->

<link href="../Assest/bootstrap.min.css" rel="stylesheet">



<!-- Template Main CSS File -->

    <style>

      .header{
        background-color: #637f32;
      }
 .contact {
  position: relative;
  isolation: isolate;
  text-align: center;
}

.contact::before {
  position: absolute;
  content: "";
  bottom: 0;
  right: 0;
  height: 75%;
  width: 100%;
  background-color: #637f32;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
  opacity: 0.08;
  z-index: -1;
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
      /* Contact Form Styles */
    .contact {
      padding: 60px 0;
      
    }

    .section-title h1 {
      font-size: 2.5rem;
      color: var(--text-dark);
      text-align: center;
      margin-bottom: 30px;
    }

    .map-container {
      max-width: 600px;
      margin: 0 auto;
    }

    iframe {
      border: 0;
      width: 100%;
      height: 300px; /* Adjust the height as needed */
    }

    .info {
      padding: 30px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      background-color: #F9F9F9;
      border-radius: 10px;
      margin-bottom: 30px;
    }

    .info h4 {
      font-size: 18px;
      color: var(--text-dark);
      font-weight: bold;
      margin-bottom: 10px;
    }

    .info p {
      font-size: 14px;
      color: var(--text-dark);
      margin-bottom: 15px;
    }

    .reghead {
      font-size: 35px;
      color: var(--text-dark);
      font-weight: bold;
      margin-bottom: 30px;
    }

    form {
      background-color: #F9F9F9;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      border: 1px solid var(--text-light);
      border-radius: 5px;
      padding: 10px;
    }

    .form-label {
      font-size: 16px;
      color: var(--text-dark);
      font-weight: bold;
      margin-top: 20px;
    }

    .submit {
      padding: 10px 20px;
      border: none;
      background-color: var(--primary-color);
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease-in-out;
      width: 100%;
      display: inline-block;
    }

    .submit:hover {
      background-color: var(--primary-color-dark);
    }

    .infoicons i{
     color: var(--text-dark);
    }

    </style>
</head>
<body>

<?php
require("../Admin/conf.php");

$sql = "SELECT * FROM mainimagee";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$images = [];

while ($row = mysqli_fetch_assoc($result)) {
    if (!empty($row['image'])) {
        $images[] = [
            'image' => $row['image'],
        ];
    }
}
?>
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($images as $index => $image): ?>
            <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                <div class="image-container">
                    <img src="../Image/<?php echo $image['image']; ?>" class="d-block w-100 image_header" alt="Slide Image">
                </div>
                <div class="image-text reveal">
                    <p>Unveil joy in modern splendor at Cocoloco Garden Resort</p>
                    <h1>Create Lasting Memories</h1>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!--navbar-->
<?php include ("navbar.php") ?><br><br>




<!--======= Contact Section ======= -->
    <section id="contact" class="contact" >
      <div class="container">
        <div class="section-title">
          
          <div class="mainhead">Contact Us</div>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126785.08229320317!2d79.90364055718979!3d6.765730667817124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24f008f278e39%3A0x8bcb8243a4584c23!2sCocoloco%20Gardens!5e0!3m2!1sen!2slk!4v1703777701087!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
              <i class="ri-map-pin-line"></i>
                <h4>Location:</h4>
                <p>179/2 Sambodhi Mawatha,Polgasowita, Sri lanka</p>
              </div>

              <div class="open-hours">
              <i class="ri-time-line"></i>
                <h4>Open Hours:</h4>
                <p>
                  Monday-Sunday:<br>
                  08:00 AM - 2300 PM
                </p>
              </div>

              <div class="email">
              <i class="ri-mail-line"></i>
                <h4>Email:</h4>
                <p>cocolco@gmail.com</p>
              </div>

              <div class="phone">
              <i class="ri-phone-line"></i>
                <h4>Call:</h4>
                <p>+94 77 782 8629</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

          <center><div class="mainhead">Send Your Quaries </div></center>

<form class="needs-validation" novalidate method="post" action="contact.php">
    <div class="row">
        <div class="col content-col">
            <div class="container w-100 justify-content-center">
                <br><br>
                <div class="justify-content-center">
                    <div class="container" style="max-width:700px;">
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-6">
                                    <label for="fullname" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder=""  pattern="[A-Za-z ]+" title="Only letters and spaces are allowed" required>
                                       

                                    <?php
                                    if (isset($errors['all_fields'])) {
                                        echo "<div class='alert alert-danger' id='all_fields-error'>{$errors['all_fields']}</div>";
                                    }
                                    ?>
                                </div>

                                <div class="col-6">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="you@example.com">
                                    <?php
                                    if (isset($errors['email'])) {
                                        echo "<div class='alert alert-danger' id='email-error'>{$errors['email']}</div>";
                                    }
                                    ?>
                                </div>

                                <!-- Adjusted for other fields -->


                                <div class="col-12">
                                    <label for="contact" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" id="contact" name="contact" pattern="[0-9]+" placeholder="">
                                    <?php
                                    if (isset($errors['contact'])) {
                                        echo "<div class='alert alert-danger' id='contact-error'>{$errors['contact']}</div>";
                                    }
                                    ?>
                                </div>

                                <div class="col-12">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject"
                                         required>
                                        <?php
                                    if (isset($errors['all_fields'])) {
                                        echo "<div class='alert alert-danger' id='all_fields-error'>{$errors['all_fields']}</div>";
                                    }
                                    ?>
                                </div>

                                <div class="col-12">
                                    <label for="message" class="form-label">Message</label>
                                    <input type="text" class="form-control" id="message" name="message"
                                        required>
                                        <?php
                                    if (isset($errors['all_fields'])) {
                                        echo "<div class='alert alert-danger' id='all_fields-error'>{$errors['all_fields']}</div>";
                                    }
                                    ?>
                                    <?php
                                    if (isset($errors['all_fields'])) {
                                        echo "<div class='alert alert-success' id='all_fields-error'>{$errors['all_fields']}</div>";
                                    }
                                    ?>
                                </div>

                            </div>

                            <hr class="my-4">

<center><button class="greenbutton" type="submit" name="submit">SUBMIT</button><center>
</form>
</div>
</div>
</div>
</div>


          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
      <br><br>  <?php include("footer.php"); ?>
</div>
<script>
        window.addEventListener('scroll', function () {
            var navbar = document.querySelector('.navbarz');
            if (window.scrollY > 0) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

</body>
</html>


