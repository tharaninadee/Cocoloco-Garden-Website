<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />     
 
        <title>Cocoloco Garden - Facilities</title>

        <link rel="stylesheet" href="../Assest/bootstrap.min.css">
        
        <link rel="stylesheet" href="../Assest/styles.css">
        
        
    </head>
    <style>
         table {
            border: 2px solid #8B4513; /* Brown color for the table border */
            margin-top: 20px;
        }
        td {
            border: 2px solid #8B4513; /* Brown color for the cell borders */
        }        
        
        .custom-h2 {
            color: #556B2F; 
            font-family: "Poppins", sans-serif;
            font-weight: bold;
            font-size: 35px; /* Adjust font size as needed */
        }
        .zooming-image {
            transition: transform 0.5s ease-in-out;
        }
        .zooming-image:hover {
            transform: scale(1.2);
        }
        .photoImage {
            width: 600px;
            height: 400px;
            margin: 0; 
            overflow: hidden;
            
        }

    .photoImage img {
        width: 600px; 
        height: 400px; 
        object-fit: cover;
        margin-left:20px;
        margin-right:20px;
        margin-top:20px;
    
    }


    </style>
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
  <?php include("navbar.php"); ?>

  <br>

<center> <div class="mainhead">FACILITY</div></center><br>

<div class="mainpara"><br>
    Accommodation at Cocolco is designed with your comfort in mind, featuring spacious and elegantly appointed rooms that offer a serene retreat after a day of exploration.
    Each room is meticulously crafted to provide a perfect balance of modern amenities and natural charm..<br><br>
</div>


    <?php require("../Admin/conf.php"); ?>
  
    <?php
    // Retrieve data from the database
    $sql = "SELECT * FROM facility";
    $result = mysqli_query($conn, $sql);
    ?>


<div class="container mt-5">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-md-6 mb-4">
                <!-- Adding margin-bottom (mb-4) for spacing -->
                <div class="row" style="background-color: rgba(144, 238, 144, 0.2); height: 600px; width: 100%;">
                    <div class="col-md-12">
                                <!-- Left Column -->
                            <div class="photoImage">
                                <img src="../Image/<?php echo $row['image']; ?>" class="img-fluid">
                            </div>

                                     <!-- Right Column -->
                            <div class="col-md-12">
                                        <!-- Content Column -->
                                <div class="heading">
                                <?php if (!empty($row['catergoryname'])) : ?>
                                    <?php echo $row['catergoryname']; ?>
                                <?php endif; ?>
                                </div>
                                <div class="paragraph">
                                    <?php if (!empty($row['description'])) : ?>
                                    <?php echo $row['description']; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        
                    </div>
                    
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

       
        <dr><dr><dr>
        
   

<?php include("footer.php"); ?>


    

    
    <script src="../Assest/script.js"></script>
    <script src="../Assest/bootstrap.bundle.min.js"></script>


  </body>
</html>