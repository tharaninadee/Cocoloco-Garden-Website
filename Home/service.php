<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />     
 
        <title>Cocoloco Garden - Services</title>

        
        
        <link rel="stylesheet" href="../Assest/styles.css">
        
        
    </head>
    <style>
                .bouncing-image {
            transition: transform 0.3s ease-in-out;
        }

        .bouncing-image:hover {
            transform: translateY(-5px);
            animation: bounce 0.5s infinite alternate;
        }

        @keyframes bounce {
            0% {
                transform: translateY(-5px);
            }
            100% {
                transform: translateY(5px);
            }
        }
        table {
            width: 100%;
        }

        td {
            width: 50%;
            height: auto;
            vertical-align: top;
        }

        .photo {
            text-align: center;
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

<center> <div class="mainhead">SERVICES</div></center><br>
<div class="container">
<div class="mainpara"><br>
    "Embark on a journey to create unforgettable memories with Cocoloco Garden. Indulge in our marvelous packages, savor precious moments with your loved ones, and let Cocoloco become your 
    second home – where every experience is a chapter in your most cherished story.
    Your extraordinary moments await, turning ordinary days into lifelong treasures."<br>
</div>
</div>

<div class="container mt-5">


<?php require("../Admin/conf.php"); ?>

<?php 

// Retrieve data from the database
$sql = "SELECT * FROM content";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);
?>

<table class="table">
    <?php
    mysqli_data_seek($result, 0);
    $active = 'active';

    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['image'] != "") {
            ?>
            <tr>
            <td class="heading" colspan="2" style="background-color: #C2DDB5;color: #9A760B;color: var(--text-dark); font-weight:bold;font-size:22px;font-family: 'Poppins';">
                <?php if ($row['heading'] != ""): ?> 
                    <?php echo $row['heading']; ?>
                <?php endif; ?>
            </td>
                </tr>
             <tr>   

                <td class="photo">
                    <img src="../Image/<?php echo $row['image']; ?>" 
                         width="100%" height="auto" role="img"  class="img-fluid bouncing-image">
                         
                </td>
                
                         
                </td>
                
                <td class="paragraph"style="color: var(--text-light);">
                <br><br><br>
                    <?php if ($row['description'] != ""): ?>
                        <?php echo $row['description']; ?>
                    <?php endif; ?>
                    <br><br><br>
                    <a href="gallery.php" class="btn">Find More Gallery</a>
                </td>
            </tr>
            <?php
            $active = ''; // Remove 'active' class only after the first item
        }
    }
    ?>
</table>

<?php
$conn->close();
?>
</div>

<br><br>
        
   

<?php include("footer.php"); ?>


    

    
    <script src="../Assest/script.js"></script>



  </body>
</html>
