<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link rel="stylesheet" href="../Assest/bootstrap.min.css">
    <link rel="stylesheet" href="../Assest/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark background">
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
                    <li class="nav-item <?php echo isPageActive('index.php'); ?>">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item <?php echo isPageActive('package.php'); ?>">
                        <a class="nav-link" href="package.php">Packages</a>
                    </li>
                    <li class="nav-item <?php echo isPageActive('service.php'); ?>">
                        <a class="nav-link" href="service.php">Services</a>
                    </li>
                    <li class="nav-item <?php echo isPageActive('facility.php'); ?>">
                        <a class="nav-link" href="facility.php">Facilities</a>
                    </li>
                    <li class="nav-item <?php echo isPageActive('gallery.php'); ?>">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item <?php echo isPageActive('contact.php'); ?>">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item <?php echo isPageActive('dayoutpackage.php'); ?>">
                        <button class="btn nav___btn"><a href="dayoutpackage.php">Book Now</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    // Function to check if the current page matches the provided page
    function isPageActive($page)
    {
        return (basename($_SERVER['PHP_SELF']) == $page) ? 'active' : '';
    }
    ?>

    <script src="../Assest/script.js"></script>

    <script>
        // Add an 'active' class to the clicked link
        document.addEventListener('DOMContentLoaded', function () {
            var links = document.querySelectorAll('.navbar a');

            links.forEach(function (link) {
                link.addEventListener('click', function () {
                    links.forEach(function (otherLink) {
                        otherLink.classList.remove('active');
                    });
                    link.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>

    
