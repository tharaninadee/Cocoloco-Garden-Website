<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Location Page</title>
    <link rel="stylesheet" href="../Assest/bootstrap.min.css">
        <link rel="stylesheet" href="../Assest/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        /* Add any additional styles if needed */
        
        table {
            border: 2px solid #8B4513; /* Brown color for the table border */
            margin-top: 20px;
        }
        td {
            border: 2px solid #8B4513; /* Brown color for the cell borders */
        }
        .custom-h2 {
            color: #556B2F; 
            font-family: 'Times New Roman';
            font-weight: bold;
            font-size: 40px; /* Adjust font size as needed */
        }
        .zooming-image {
            transition: transform 0.5s ease-in-out;
        }
        .zooming-image:hover {
            transform: scale(1.2);
        }

       
        .image-container {
            height: 100%;
            overflow: hidden;
        }

        .image-container img {
            width: 50%;
            height: 70%;
            object-fit: cover;
        }
        .mainpara1{
            font-family: "Poppins", sans-serif;
            font-size: 15px;
                    
        }

        .heading{
            font-family: "Poppins", sans-serif;
            font-size: 25px;
            font-weight: bold;
            color: #9A760B;
            text-align: center;
            margin-top:20px;    
         }
        

        .mainheadd{
        color: #556B2F;
        font-family: "Poppins";
        font-weight: bold;
        font-size: 25px;
        }

        .mainpara{
        font-family: "Poppins";
        font-size:  0.9rem;
        text-align: center;
        color: dark brown;
        margin-left:20px;
        margin-right:20px;
           
        }
        .navbar {
            width: 100%;
            background-color: var(--primary-color);
            color: var(--white);
            z-index: 1000;
            transition: background-color 0.5s ease;
            position: fixed;
            top: 0;
            height:100px;
        }

        .navbar.scrolled {
            background-color: var(--primary-color);
        }


.nav___btn {
  border: 1px solid var(--white);
  padding: 0.75rem 1.5rem;
  outline: none;
  font-size: 1rem;
  font-weight: 500;
  color: var(--white);
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  background-color: var(--primary-color); /* Make the background transparent */
}

.nav___btn:hover {
  background-color: var(--primary-color-dark); /* Change the background color on hover */
  color: var(--white); /* Change the text color on hover */
  border: 1px solid var(--white);
}

.nav___btn a {
  position: relative;
  isolation: isolate;
  color: var(--white) !important; /* Important to override Bootstrap styles */
  transition: 0.3s;
}

/* Add this block for the scrolled state */
.nav___btn.scrolled {
  border: 1px solid var(--white);
}

.nav__bar {
  padding: 1rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
  background-color: var(--primary-color);
}

/* Customize the Bootstrap navbar links */
.navbar-nav {
  display: flex;
  align-items: center;
}

.navbar-nav .nav-item {
  margin-right: 20px; /* Add more space between navbar links */
}

.navbar-nav .nav-link {
  color: var(--white) !important; /* Change link color to white */
  transition: 0.3s;
}

.navbar-nav .nav-link:hover {
  color: var(--primary-color-dark) !important; /* Change link color on hover */
}

        



    </style>
</head>
<body>

<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark background" >
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../Image/logo.png" alt="logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="package.php">Packages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="service.php">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="facility.php">Facilities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
            <button class="btn nav___btn"><a href="dayoutpackage.php">Book Now</a></button>
        </li>
    </ul>
</div>

        </div>
    </nav>

    
<br><br><br><br><br><br>


<center> <div class="mainheadd">PHOTOSHOOT PACKAGE</div></center><br>

<div class="mainpara"><br>
    Do you seek a refreshing change in your routine? Consider our CocoLco Day Out package,
    tailored to perfectly complement your leisure time. Embrace a delightful escape and make the most of your moments with us.<br><br><br>
</div>


    <?php require("../Admin/conf.php"); ?>

    <?php
    // Retrieve data from the database
    $sql = "SELECT * FROM photoshootcater";
    $result = mysqli_query($conn, $sql);
    ?>


<div class="container" style="margin-top: 20px; max-width: 1200px;">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-md-6 mb-4">
                <!-- Adding margin-bottom (mb-4) for spacing -->
                <div class="row" style="background-color: rgba(144, 238, 144, 0.2); margin-bottom: 20px; margin-right: 30px; padding: 20px;">
                    <div class="col-md-12">
                        <!-- Image Column -->
                        <div class="image-container">
                            <img src="../Image/<?php echo $row['image']; ?>" style="width: 100%; height: auto;">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- Content Column -->
                        <br><h2 class="heading">
                            <?php if (!empty($row['catergoryname'])) : ?>
                                <?php echo $row['catergoryname']; ?>
                            <?php endif; ?>
                        </h2>
                        <div class="mainpara1">
                            <?php if (!empty($row['description'])) : ?>
                                <?php echo $row['description']; ?>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>


  
       
        <br><br>
        <?php include("footer.php"); ?>
    
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


