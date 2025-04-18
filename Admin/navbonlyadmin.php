<?php
// Include your configuration file
require("conf.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <script src="../Assest/script.js" defer></script>


        <link rel="stylesheet" href="../Assest/styles3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
       
       

        
        
    </head>
    
    <body>
        <!--navbar-->
        
        <nav class="navbarz" style="background-color:#556B2F" >

            <div class="navbar-content">
                <h1 class="logoo"> Admin Panel</h1>
 
            </div>
            
            <ul class="nav-linkz">
            <li><a href="view.php">Home</a></li>
            <li><a href="facilityadmin.php">FACILITY</a></li>
            <li><a href="serviceadmin.php">SERVICE</a></li>
            <li><a href="PackageMain.php">PACKAGE</a></li>
            <li><a href="GalleryMainAdmin.php">GALLERY</a></li>
            <li><a href="MIHomeadmin.php">COVER IMAGE</a></li>
            <li><a href="Message.php">MESSAGE</a></li>
            </ul>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../Image/profile.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small">
                    
                    <li><a class="dropdown-item" style="background-color: green; color:white;" href="logout.php">Sign out</a></li>
                </ul>
            </div>

        
        </nav>

        
        
        <script src="../Assest/bootstrap.bundle.min.js"></script>

    </body>
</html>