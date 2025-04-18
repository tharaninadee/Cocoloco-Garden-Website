<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />     
 
        <title>Cocoloco Garden - Package</title>

        <link rel="stylesheet" href="../Assest/bootstrap.min.css">
        
        <link rel="stylesheet" href="../Assest/styles.css">
        
        
    </head>
    <style>
  

    .container {
        max-width: 1140px; /* Adjust max-width as needed */
        margin: 0 auto;
    }

    /* Row Styles */
    .row {
        margin: 20px 0; /* Adjust margin as needed */
    }

    /* Column Styles */
    .col-md-6 {
        padding: 0 15px; /* Adjust padding as needed */
    }

    /* Additional Styling for Image in Column */
    .col-md-6 img {
        width: 100%; /* Make image responsive */
        border-radius: 8px; /* Optional: Add border-radius for a rounded image */
    }

    /* Text Styles for Content in Column */
    .col-md-6 h2 {
            margin-top:20px;
            font-family: "Poppins", sans-serif;
            font-size: 22px;
            font-weight: bold;
            color: var(--text-dark);
            text-align: center;
                
            }

    .col-md-6 p {
            margin-top:60px;
            font-family: "poppins";
            font-size: 0.9rem;
            font-weight: 100;
            line-height: 1.75rem;
            text-align: center;
            color: var(--text-light);
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

<center> <div class="mainhead"> PACKAGES </div></center><br><br>
<div class="container">
    <div class="mainpara">
    "Embark on a journey to create unforgettable memories with Cocoloco Garden. Indulge in our marvelous packages, savor precious moments with your loved ones, and let Cocoloco become your 
    second home – where every experience is a chapter in your most cherished story.
    Your extraordinary moments await, turning ordinary days into lifelong treasures."<br><br>
    </div>
</div>

<br><br>

    <div class="container">
    <div class="row" style="background-color: #C2DDB5;">
            <!-- First Row -->
            <div class="col-md-6">
                <!-- First Column (Left) -->
                <img src="../Image/celebration.jpg" alt="Image 1" class="img-responsive">
            </div>
            <div class="col-md-6">
                <!-- Second Column (Right) -->
                <center> <h2>DAY OUT PACKAGE</h2> </center>
                <p>Spend your day out in Cocoloco Garden, where every moment becomes a story, and every experience is a page in the book of memories. From the warmth of hospitality to the luxury of relaxation,
                     let the hotel be the canvas for a day filled with comfort, indulgence, and delightful surprises</p>
                     <br><br>
            <center><a href="dayoutpackage.php" class="btn">View More</a> </center>
                    </div>
            
            
        </div>

        <br><br><br>

        <div class="row">
            <!-- Second Row -->
            <div class="col-md-6">
                <!-- Second Column (Right) -->
                <center> <h2>PHOTO SHOOT PACKAGE</h2></center>
                <p>Discover the magic of moments captured in the enchanting backdrop of a hotel. Every photo is a tale, and every corner unveils a new story. In the artistry 
                    of a hotel, every frame is an invitation to celebrate the beauty of life against a backdrop of luxury and elegance.</p>
                    <br><br>
            <center><a href="photolocation.php" class="btn">View More</a> </center>

                </div>
            
            <div class="col-md-6">
                <!-- First Column (Left) -->
                <img src="../Image/bride.jpg" alt="Image 2" class="img-responsive">
            </div>
            
            
        </div>

        <br><br><br>

        <div class="row">
        <div class="row" style="background-color: #C2DDB5;">
            <!-- Third Row -->
            <div class="col-md-6">
                <!-- First Column (Left) -->
                <img src="../Image/wedding.jpg" alt="Image 3" class="img-responsive">
            </div>
            <div class="col-md-6">
                <!-- Second Column (Right) -->
                <center> <h2>ROOM PACKAGE</h2></center>
                <p>Indulge in the allure of our room packages – where every stay becomes a curated experience, blending comfort, luxury, and a touch of personalized hospitality. 
                    Unwind in style, as we redefine your stay, making each moment a memory to cherish in the heart of our hotel packages</p>
                    <br><br>
            <center><a href="rooms.php" class="btn">View More</a> </center>
                </div>
           
           
        </div>
        
    </div>
</div>
    <br><br>
   

<?php include("footer.php"); ?>


    

    
    <script src="../Assest/script.js"></script>
    <script src="../Assest/bootstrap.bundle.min.js"></script>


  </body>
</html>