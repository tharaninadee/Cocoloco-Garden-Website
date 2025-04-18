<?php
// Include your configuration file
require("conf.php");

// Start the session
session_start();

// Check if the admin is not logged in, redirect to the login page
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../Home/logindayout.php");
    exit();
}

// Rest of your code for the admin view page goes here

if (isset($_POST['additem'])) {
    $targetDir = "../Image/";

    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $categoryname = $_POST['categoryname'];
                $sql = "INSERT INTO gallerymain (categoryname, image) VALUES ('$categoryname', '$fileName')";
                
                if (mysqli_query($conn, $sql)) {
                    $msg = "Image uploaded successfully.";
                } else {
                    $msg = "Error in inserting data: " . $conn->error;
                }
            } else {
                $msg = "Error uploading file.";
            }
        } else {
            $msg = "Invalid file format. Allowed formats: JPG, JPEG, PNG, GIF.";
        }
    } else {
        $msg = "Please select an image file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cocoloco Garden : Gallery</title>
    <link href="../Assest/bootstrap.min.css" rel="stylesheet">
    <link href="../Assest/style3.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style3.css">
    <link href="../Assest/styletable.css" rel="stylesheet">
</head>

<style>
    /* Add your existing styles here */

    .custom-table {
        border-collapse: collapse;
        width: 80%;
    }

    .custom-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .top {
        font-family: 'Calibri';
        font-size: 22px;
        color: Green;
        font-weight: bold;
    }
</style>

<body>
    <?php include("navbonlyadmin.php") ?>
    <br><br><br>

    <div class="topic">
        <img class="coco" width="80" height="50" style="margin-right:100px; margin-bottom:10px; margin-left:30px;" role="img"
            src="../Image/loco.png"> Add Cocoloco Gallery
    </div>

    <main class="m-2">
        <br>
        <div class="justify-content-center">
            <div class="container" style="max-width:700px;">
                <form action="GalleryMainAdmin.php" method="POST" class="needs-validation" novalidate
                    enctype="multipart/form-data">
                    <div class="row g-3">
                        <h3 class="mb-2 fw-normal text-warning text-center fs-5"
                            style="font-family: 'Signika Negative', sans-serif;">
                            <?php if (isset($msg)) { ?>
                            <div class="text-warning">
                                <?php echo $msg; ?>
                            </div>
                            <?php } ?>
                        </h3>

                        <div class="col-12">
                            <label for="file" class="Adding-label">Image</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>

                        <div class="col-12">
                            <label for="categoryname">Gallery Category:</label>
                            <select class="form-select" name="categoryname" required>
                                <option value="wedding">Wedding</option>
                                <option value="wedding">Birthday</option>
                                <option value="specialevents">Special Events</option>
                                <option value="facilities">Facilities</option>
                                <option value="dayouting">Day Outing</option>
                                <option value="photoshoot">Photoshoot</option>
                            </select>
                        </div>
                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-outline-success btn-lg" name="additem" type="Submit">Continue to Add</button>
                </form>
            </div>
        </div>

        <table class="AddingTable">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <?php
            // Fetching and displaying data in the table
            $selectedCategory = isset($_POST['categoryname']) ? $_POST['categoryname'] : '';

            $query = $conn->query("SELECT * FROM `gallerymain` WHERE categoryname = '$selectedCategory'") or die(mysqli_error());

            while ($fetch = $query->fetch_array()) {
                echo '<tr>';
                echo '<td>' . $fetch['image'] . '</td>';
                echo '<td><center><img src="../Image/' . $fetch['image'] . '" height="50" width="50"/></center></td>';
                echo '<td><center><a class="btn btn-danger" onclick="confirmationDelete(this); return false;" href="../Delete/delete_Gallery.php?id=' . $fetch['ImageId'] . '"><i class="glyphicon glyphicon-remove"></i> Delete</a></center></td>';
                echo '</tr>';
            }
            ?>
        </table>

        <script>
            function confirmationDelete(anchor) {
                var conf = confirm("Are you sure you want to delete this record?");
                if (conf) {
                    window.location = $(anchor).attr("href");
                }
            }
        </script>
    </main>
    <?php require("conf.php");?>
</body>

</html>
