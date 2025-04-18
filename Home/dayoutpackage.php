
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assest/styles.css">
    
    <title>Day Out Package</title>
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

    

    .imagee-container {
        height: 100%;
        overflow: hidden;
    }

    .imagee-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
        .paragraph1{
        margin-top:20px;
        margin-bottom:20px;
        font-family: "Poppins", sans-serif;
        font-size: 16px;
        font-size: 0.9rem;
        font-weight: 500;
        line-height: 1.50rem;
        color: var(--text-light);
        }
                
        .navbarz {
            width: 100%;
            background-color: var(--primary-color);
            color: var(--white);
            z-index: 1000;
            transition: background-color 0.5s ease;
            position: fixed;
            top: 0;
            height:100px;
        }

        .navbarz.scrolled {
            background-color: var(--primary-color);
        }

        .navbarz-brand img {
            max-height: 50px; /* Adjust as needed */
        }

        .navbarz-toggler-icon {
            color: var(--white);
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

        .nav__bar {
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            background-color: var(--primary-color);
        }

        .navbarz-nav {
            display: flex;
            align-items: center;
        }

        .navbarz-nav .nav-item {
            margin-right: 20px; /* Add more space between navbar links */
        }

        .navbarz-nav .nav-link {
            color: var(--white) !important; /* Change link color to white */
            transition: 0.3s;
        }

        .navbarz-nav .nav-link:hover {
            color: var(--primary-color-dark) !important; /* Change link color on hover */
        }
    </style>

</head>

<body>
    <!--navbar-->
    <nav class="navbarz navbar-expand-lg navbar-dark background">
        <div class="container">
            <a class="navbarz-brand" href="#">
                <img src="../Image/logo.png" alt="logo" class="logo">
            </a>
            <button class="navbarz-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarzNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbarz-toggler-icon"></span>
            </button>
            <div class="collapse navbarz-collapse" id="navbarzNav">
                <ul class="navbarz-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <!-- Add other navbar links as needed -->
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
                        <a class="nav-link" href="dayoutpackage.php">Book Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    


<br><br><br><br><br>

<center> <div class="mainhead">DAY OUT PACKAGES</div></center><br>

<div class="mainpara"><br>
Do you seek a refreshing change in your routine? Consider our CocoLco Day Out package,
 tailored to perfectly complement your leisure time. Embrace a delightful escape and make the most of your moments with us.<br><br><br>
</div>


    <?php require("../Admin/conf.php"); ?>

    <?php
    // Retrieve data from the database
    $sql = "SELECT * FROM packagecater";
    $result = mysqli_query($conn, $sql);
    ?>


    <?php while ($row = mysqli_fetch_assoc($result)) : ?>

        <div class="row" style="background-color: rgba(144, 238, 144, 0.2); margin-left: 150px;margin-right: 150px; margin-bottom:40px">
            <div class="col-md-3">
                <!-- First Column (Left) -->
                <div class="imagee-container">
                    <img src="../Image/<?php echo $row['image']; ?>" class="img-fluid zooming-image" alt="Image">
                </div>
            </div>

            <div class="col-md-9">
                <h2 class="heading">
                    <?php if (!empty($row['catergoryname'])) : ?>
                        <?php echo $row['catergoryname']; ?>
                    <?php endif; ?>
                </h2>
                <div class="paragraph1">
                    <?php if (!empty($row['description'])) : ?>
                        <?php echo $row['description']; ?>
                    <?php endif; ?>
                </div>
                <a href="logindayout.php" class="btn">Make your Reservation</a>
            </div>
        </div>

    <?php endwhile; ?>
    <br><br>

  
        <?php include("buffet.php"); ?>
        <br>
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