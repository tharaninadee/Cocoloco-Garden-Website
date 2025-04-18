<?php
if (isset($_POST["submit"])) {
    $user_role = $_POST["user_role"];
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];

    $mysqli = new mysqli('localhost', 'root', '', 'cocolocogarden');

    $errors = array();

    if (empty($user_role) || empty($fullName) || empty($email) || empty($password) || empty($confirmpassword) || empty($contact) || empty($address)) {
        $errors['all_fields'] = "All fields are required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }
    if (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long";
    }
    if ($password !== $confirmpassword) {
        $errors['confirm_password'] = "Passwords do not match";
    }
    if (strlen($contact) < 8 || !preg_match("/^[0-9]+$/", $contact)) {
        $errors['contact'] = "Contact must be at least 8 characters long and contain only numbers";
    }

    require_once "../Admin/conf.php";
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $errors['email_exists'] = "Email already exists!";
    }

    if (count($errors) > 0) {
        echo "<div class='alert alert-danger'>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo "</div>";
    } else {
        $sql = "INSERT INTO users (user_role,fullname, email, password, contact, address) VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt, "ssssis", $user_role, $fullName, $email, $password, $contact, $address);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        } else {
            die("Something went wrong");
        }
    }
}
?>



<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>
  <link href="../Assest/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../Assest/style.css" rel="stylesheet">
  <link href="../Assest/styletable.css" rel="stylesheet">

  <!-- Custom styles for this template -->

  <style>
    .h1 {
      font-size: 25px;
      color: #556B2F;
      font-family: "Poppins", sans-serif;
      align-items: center;
      font-weight: bold;
      margin-top: 20px;
    }

    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 5px;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .greenbutton {
      background-color: #637f32;
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
      background-color: #4C622C;
      color: white;
      border: 1px solid white;
    }
  </style>
  <div class="topic"><img class="coco" width="80" height="50" style="margin-right:100px;margin-left:30px;" role="img" src="../Image/loco.png">REGISTER WITH COCOLOCO
    <button class="greenbutton" style="margin-bottom:10px; margin-left:600px;" onclick="goBack('logindayout.php')">Back</button>
  </div>
  <br>
</head>

<body class="align-items-center" style="min-height:100vh;">

  <center>
    <div class="h1">Create a Membership Account With Us</div>
  </center>

  <form class="needs-validation" novalidate method="post" action="indexReg.php">
    <div class="row">
      <div class="col content-col">
        <div class="container w-100 justify-content-center">
          <br><br>
          <div class="justify-content-center">
            <div class="container" style="max-width:700px;">
              <form class="needs-validation" novalidate>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="user_role" class="form-label">User Type</label>
                    <select id="user_role" name="user_role" class="user_role form-control">
                      <option value="Customer">Customer</option>
                      <!-- Add more user types here if needed -->
                    </select>
                  </div>

                  <div class="col-md-6">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="" value="" required>
                    <?php
                    if (isset($errors['fullname'])) {
                      echo "<div class='alert alert-danger' id='fullname-error'>{$errors['fullname']}</div>";
                    }
                    ?>
                  </div>

                  <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                    <?php
                    if (isset($errors['email'])) {
                      echo "<div class='alert alert-danger' id='email-error'>{$errors['email']}</div>";
                    }
                    ?>
                  </div>

                  <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php
                    if (isset($errors['password'])) {
                      echo "<div class='alert alert-danger' id='password-error'>{$errors['password']}</div>";
                    }
                    ?>
                  </div>

                  <div class="col-md-6">
                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Password">
                    <?php
                    if (isset($errors['confirmpassword'])) {
                      echo "<div class='alert alert-danger' id='confirmpassword-error'>{$errors['confirmpassword']}</div>";
                    }
                    ?>
                  </div>

                  <div class="col-md-6">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="tel" class="form-control" id="contact" name="contact" placeholder="">
                    <?php
                    if (isset($errors['contact'])) {
                      echo "<div class='alert alert-danger' id='contact-error'>{$errors['contact']}</div>";
                    }
                    ?>
                  </div>

                  <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                    <?php
                    if (isset($errors['address'])) {
                      echo "<div class='alert alert-danger' id='address-error'>{$errors['address']}</div>";
                    }
                    ?>
                  </div>

                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-outline-success btn-lg" type="submit" name="submit">Continue to Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script>
    function goBack(phpPage) {
      // Navigate to the specified PHP page
      window.location.href = phpPage;
    }
  </script>

  <br><br><br><br>
  <?php include("footer2.php") ?>

</body>

</html>
