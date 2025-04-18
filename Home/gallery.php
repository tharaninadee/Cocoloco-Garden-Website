<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assest/bootstrap.min.css">
        
        <link rel="stylesheet" href="../Assest/styles.css">
    
    <title>Gallery</title>
    <style>

.category-links {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .category-col {
        margin-right: 15px;
    }

    .category-link {
        font-family: "Poppins", sans-serif;
        font-size: 18px;
        color: #556B2F;
        text-decoration: none;
        padding: 5px 10px;
        border: 2px solid white;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .category-link.active {
        background-color: #556B2F;
        color: #fff;
    }

    /* Style for the image list */
    .image-list {
        margin-top: 20px;
    }

    .image-card {
        margin-top:30px;
        margin-bottom: 30px;
        overflow: hidden;
        border: 2px solid white;
        border-radius: 5px;
    }

    .gallery-image {
        width: 100%;
        height: 25rem;
    }

    .mainhead {
        color: #556B2F;
        font-family: "Poppins";
        font-weight: bold;
        font-size: 25px;
        text-align:center;
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
  <?php include("navbar.php"); ?>

    
<div class="container mt-5">
    
            <div class="mainhead">Gallery</div><br>
   
        <div class="containers">
            <div class="mainpara">
                Embark on a journey to create unforgettable memories with Cocoloco Garden. Indulge in our marvelous packages, savor precious moments with your loved ones, and let Cocoloco become your second home – where every experience is a chapter in your most cherished story. Your extraordinary moments await, turning ordinary days into lifelong treasures.<br><br>
            </div>
        </div>

        <div class="category-links">
    <div class="category-col">
        <a href="?category=wedding" class="category-link <?php echo (isset($_GET['category']) && $_GET['category'] == 'wedding') ? 'active' : ''; ?>">
            <span>Weddings</span>
        </a>
    </div>

    <div class="category-col">
        <a href="?category=specialevents" class="category-link <?php echo (isset($_GET['category']) && $_GET['category'] == 'specialevents') ? 'active' : ''; ?>">
            <span>Special Events</span>
        </a>
    </div>

    <div class="category-col">
        <a href="?category=facilities" class="category-link <?php echo (isset($_GET['category']) && $_GET['category'] == 'facilities') ? 'active' : ''; ?>">
            <span>Facilities</span>
        </a>
    </div>

    <div class="category-col">
        <a href="?category=dayouting" class="category-link <?php echo (isset($_GET['category']) && $_GET['category'] == 'dayouting') ? 'active' : ''; ?>">
            <span>Day Outing</span>
        </a>
    </div>

    <div class="category-col">
        <a href="?category=photoshoot" class="category-link <?php echo (isset($_GET['category']) && $_GET['category'] == 'photoshoot') ? 'active' : ''; ?>">
            <span>Photo Shoots</span>
        </a>
    </div>
</div>

<div class="image-list row">
    <?php
    // Include the database connection file
    include('../Admin/conf.php');

    // Get the selected category or default to 'wedding'
    $category = isset($_GET['category']) ? $_GET['category'] : 'wedding';

    // SQL query to fetch products of the selected category
    $sql = "SELECT * FROM gallerymain WHERE categoryname = '$category'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display product information
            echo '<div class="col-md-4">';
            echo '<div class="image-card">';
            echo '<img class="gallery-image" src="../Image/' . $row['image'] . '" alt="' . $row['image'] . '">';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<h2>No images found.</h2>';
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

              
   
</div>
<br><br>
<?php include("footer.php"); ?>

<script src="../Assest/script.js"></script>
    <script src="../Assest/bootstrap.bundle.min.js"></script>



</body>
</html>


   

