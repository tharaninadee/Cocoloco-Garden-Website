<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />     
 
        <title>Cocoloco Garden - Home</title>

        <link rel="stylesheet" href="../Assest/bootstrap.min.css">
        
        <link rel="stylesheet" href="../Assest/styles.css">
        
        
    </head>
    <style>

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

        
    <section class="about" id="about">
      <div class="section__container about__container">
        <div class="about__grid">
          <div class="about__image">
            <img src="../Image/coco3.jpeg" alt="about" />
          </div>
          <div class="about__card">
            <img src="../Image/coco2.jpeg" alt="about" />
          </div>
          <div class="about__image">
            <img src="../Image/coco6.jpeg" alt="about" />
          </div>
          <div class="about__card">
            <img src="../Image/coco4.jpeg" alt="about" />
          </div>
        </div>

      <div class="about__content">
        <p class="section__subheader">ABOUT US</p>
        <h2 class="section__header">COCOLOCO GARDENS</h2>
        <p class="section__description">
        At Cocoloco Garden, we welcome simplicity as the core of our haven. 
        Surrounded by the embrace of nature, we carefully craft moments that eloquently convey their beauty in silence. 
        Every event, each retreat is like an experience. 
        Join us in the art of celebrating life's simple pleasures, where every detail is a deliberate choice towards a more meaningful experience. Cocoloco Garden — where less becomes an unforgettable expression of more.
        </p>
        <div class="about__btn">
          <button class="btn"><a href="https://maps.app.goo.gl/BP9bzQYpodXjmwvm6">Get Directions</a></button>
        </div>
      </div>
    </section>
    
    <section class="section__appointment">
      <div class="text-container">
        <h1>Say 'I Do' in Paradise<br>Book Your Dream Wedding Now! <br><br></h1>
        <p class="appointment">Create everlasting memories with a picture-perfect wedding at our resort.<br> Our dedicated team ensures a seamless experience from venue selection to personalized service, <br>capturing every moment of your special day</p>
      </div>
      <div class="button-container">
        <button class="find_btn"><a href="service.php">FIND OUT MORE</button>
        <button class="btn"><a href="appointment.php">RESERVE NOW</a></button>
      </div>
    </section>


    <section class="section__container package__container">
      <p class="section__subheader">OUR PACKAGE TYPES</p>
      <h2 class="section__header">THE MOST MEMORABLE REST TIME STARTS HERE.</h2>
      <div class="room__grid">
        <div class="room__card">
          <div class="room__card__image">
            <img src="../Image/pack.jpeg" alt="room" />
          </div>
          <div class="room__card__details">
            <h4>DAY OUT PACKAGES</h4>
            <p>
            Savor enchanting evenings with our Dinner Packages at Cocoloco Gardens. Elevate your nights with curated culinary delights under the stars.
            </p>
            <button class="btn"><a href="dayoutpackage.php">View More</a></button>
          </div>
        </div>
        <div class="room__card">
          <div class="room__card__image">
            <img src="../Image/shoot13.jpeg" alt="room" />
          </div>
          <div class="room__card__details">
            <h4>PHOTOSHOOT LOCATION PACKAGES</h4>
            <p>
            Savor the day with our delectable buffet packages at Cocoloco Gardens. Elevate your daytime gatherings with delightful flavors in a lush setting.

            </p>
            <button class="btn"><a href="photolocation.php">View More</a></button>
          </div>
        </div>
        <div class="room__card">
          <div class="room__card__image">
            <img src="../Image/shoot5.jpeg" alt="room" />
          </div>
          <div class="room__card__details">
            <h4>OTHER PACKAGES</h4>
            <p>
            Elevate your experience with our specially crafted packages at Cocoloco Gardens. From brunch to dinner, savor delightful moments in our enchanting setting.
            </p>
            <button class="btn"><a href="package.php">View More</a></button>
          </div>
        </div>
      </div>
    </section>

    <section class="video-section">
    <video controls width="800" height="450">
        <source src="../Upload/video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</section>

<section class="event">
    <?php
    // Retrieve data from the database
    $sql = "SELECT * FROM specialevent";
    $result = mysqli_query($conn, $sql);
    ?>

    <div class="container mt-5">
        <div class="event__details">
            <h2>EXCITING EVENT ENTERTAINMENT</h2>
            <p>Exceptional events, endless entertainment at Cocoloco Gardens. Elevate your special moments with us, where nature meets celebration in perfect harmony</p>
        </div>

        <div id="eventCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner2">
                <?php $count = 0; $active = ' active'; ?>
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <div class="col-md-4 mb-4<?php echo $active; ?>">
                            <div class="image-container2">
                                <img src="../Image/<?php echo $row['image']; ?>" alt="Event Image" class="d-block w-100">
                            </div>
                        </div>

                        <?php
                        $count++;
                        $active = ($count % 3 == 0) ? ' active' : '';
                        ?>
                    <?php endwhile; ?>
                </div>
            </div>

            <!-- Add carousel control arrows -->
            <a class="carousel-control-prev" href="#eventCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   
            </a>
            <a class="carousel-control-next" href="#eventCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>

            </a>
        </div>
    </div>
</section>

<?php include("footer.php"); ?>


    

    
    <script src="../Assest/script.js"></script>
    <script src="../Assest/bootstrap.bundle.min.js"></script>


  </body>
</html>
