<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Buffet</title>
    <style>
        /* Existing styles remain unchanged */

      

        .image-container {
            height: 100%;
            overflow: hidden;
        }

        .Image {
            height: 70%;
            width: 50%;
        }

        
    </style>
</head>

<body>
<?php include ("navbar.php") ?>

    <?php require("../Admin/conf.php"); ?>

    <?php
    // Retrieve data from the database
    $sql = "SELECT * FROM buffet";
    $result = mysqli_query($conn, $sql);
    ?>

    <main class="m-2" style="background-color: rgba(144, 238, 144, 0.1);">
        <center>
            <div class="mainhead">Cocolcoc Buffet Menu</div>
        </center>


        <div class="mainpara"><br>
            You can choose one of the BUFFET categories for your own day out package.<br><br><br>
        </div>

        <?php $count = 0; ?>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="col-md-4 mb-4"> <!-- Adjusted to col-md-4 to fit three columns in a row -->
                    <!-- First Column (Left) -->
                    <div class="image-container">
                        <img src="../Image/<?php echo $row['image']; ?>" class="img-fluid zooming-image" alt="Image" style="width: 70%; height: 100%;">
                    </div>
                </div>

                <?php
                $count++;
                if ($count % 3 == 0) {
                    echo '</div><div class="row">';
                }
                ?>
            <?php endwhile; ?>
        </div>
    </main>

    <script src="../Assest/bootstrap.bundle.min.js"></script>
    <!-- ... (your existing scripts) ... -->

    <!-- Include jQuery and Bootstrap JS -->
    
</body>

</html>
