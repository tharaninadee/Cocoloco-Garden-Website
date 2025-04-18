<?php
session_start();

// Include your database connection or configuration file
include('../Admin/conf.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // User is authenticated, start the session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_role'] = $row['user_role']; // Add this line

        if ($row['user_role'] == 'admin') {
            // This user is an admin, redirect to the admin panel
            header("Location: ../Admin/view.php");
            exit();
        } else {
            // Regular user, redirect to the Calendar page
            header("Location: Calender.php");
            exit();
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid email or password</div>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cocoloco Garden - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="../Assest/styles.css">
  <link rel="stylesheet" href="../Assest/stylesmain.css">

  <style>
    /*login*/
    .container-login {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }

    .container__left {
      flex: 1;
      margin-right: 20px;
      background-color: #fff;
    }

    .content {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .header-login {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .back__btn {
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1.5rem;
      color: var(--text-light);
      margin-bottom: 10px;
      margin-right: 200px
    }

    .form__content {
      max-width: 400px;
      margin: 0 auto;
    }

    .form__title {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 20px;
      color: #87680d;
    }

    .form__subtitle {
      font-size: 1.2rem;
      color: #666;
      margin-bottom: 30px;
    }

    .form-field {
      width: 100%;
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      font-size: 1rem;
    }

    .btn-login {
      background-color: #637f32;
      color: #fff;
      padding: 15px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1.2rem;
      transition: background-color 0.3s ease;
      width: 100%;
    }

    .btn-login:hover {
      background-color: #4C622C;
    }

    .bottom__line {
      height: 3px;
      width: 100%;
      background-color: var(--text-light);
      margin: 20px 0;
    }

    .footer__title {
      text-align: center;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
    }

    .container__right {
      flex: 1;
      background-image: url('../Image/coco7.jpeg');
      background-size: cover;
      background-position: center;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      color: white;
      text-align: center;
      flex-direction: column;
      justify-content: center;
      height: 100vh;
      position: relative;
  
    }

    .btn-register {
        position: absolute;
        bottom: 30px;
        margin-right: 10px;
        text-align: center;
        left: 50%;
        transform: translateX(-50%);
    }


        .btn-register:hover {
            background-color: #4C622C;
        }


    .container__right h3 {
      margin-bottom: 10px;
      margin-top: 550px;
      font-size:40px;
    }

    .container__right p {
      margin-bottom: 30px;
      margin-bottom: 30px;
    }
  </style>
</head>

<body>

  <div class="container-login">
    <div class="container__left">
      <div class="content">
        <div class="header-login">
          <span class="back__btn" onclick="goBack()">
            <i class="ri-arrow-left-line"></i>
          </span>
        </div>
        <div class="form__content">
          <h3 class="form__title">Login</h3>
          <p class="form__subtitle">Welcome! Please fill in your username and password to sign in to your account.</p>
          <form class="needs-validation" novalidate method="post" action="">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-field" id="email" name="email" placeholder="email@example.com" required>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-field" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-login">Sign in</button>
          </form>
        </div>
      </div>
    </div>
    <div class="container__right">
      <div class="right-caption">
        <h3>New Around Here?</h3>
        <p>Create your own account to enjoy Cocoloco Gardens!</p>
        <button type="submit" name="submit" class="btn btn-register"><a href="indexReg.php">Sign Up</a></button>
      </div>
    </div>
  </div>

  <script>
    function goBack() {
      // Specify the relevant PHP page
      var phpPage = 'dayoutpackage.php';

      // Navigate to the PHP page
      window.location.href = phpPage;
    }
  </script>
</body>

</html>
