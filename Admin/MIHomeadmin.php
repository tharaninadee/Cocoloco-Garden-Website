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

?>

<?php include ("navbonlyadmin.php") ?>
<?php
if (isset($_POST['additem'])) {
  
    $targetDir = "../Image/";

    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO mainimagee (image) VALUES ('$fileName')";
                if (mysqli_query($conn, $sql)) {
                    $msg2 = "Image Added successfuly ";
                } else {
                    $msg = "Error in inserting data " . "<br/>(" . $conn->error . ")";
                }
           
            }
        } else {
            $msg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';

        }
    
    }
}


?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Cover Image : Admin</title>
<link href="../Assest/styletable.css" rel="stylesheet">
<link href="../Assest/bootstrap.min.css" rel="stylesheet">
<style>
     .btn-brown {
    /* Customize button styles as needed */
    background-color: #8B4513;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    margin-left: 20px;
}


.btn-brown:hover {
    background-color: darkgreen; 
    color: #fff;
}
</style>


<body>
 <br><br><br>
<div class="topic"><img class="coco" width="80" height="50" style="margin-right:100px; margin-bottom:10px; margin-left:30px;" role="img" src="../Image/loco.png"> Add Home Page Main Image</div>

    <main class=" m-2">
        <br>
        <div class="justify-content-center">

            <!-- <h4 class="mb-3">Billing address</h4> -->
            <div class="container" style="max-width:700px;">

                <form action="MIHomeadmin.php" Method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    <div class="row g-3">

                        <h3 class="mb-2 fw-normal text-warning text-center fs-5"
                            style="font-family: 'Signika Negative', sans-serif;">
                            <?php if (isset($msg)) { ?>
                                <div class="text-warning">
                                    <?php echo $msg; ?>
                                </div>
                            <?php } else if (isset($msg2)) { ?>
                                    <div class="text-success">
                                    <?php echo $msg2; ?>
                                    </div>
                            <?php } ?>
                        </h3>

                        
                        <div class="col-12">
                            <label for="file" class="Adding-label">Photo</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>

                       

                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-outline-success btn-lg" name="additem" type="Submit">Continue
                        to Add</button>
                </form>
            </div>
        </div>

        

       
</div>

        
    </main>
    <?php require("conf.php");?>
<body>
<caption><h4>Main Page Cover Image Table</h4></caption>
<table class="AddingTable">
 
  <thead>
    <tr>
      
   
      <th scope="col">Image</th>
      <th scope="col">Action</th>

    </tr>
  </thead>

                        <?php

						$query = $conn->query("SELECT * FROM `mainimagee`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	

      <tr>
      
      <td><?php echo $fetch['image'] ?><img src = "../Image/<?php echo $fetch['image']?>" height = "50" width = "50"/></td>
        <td><a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "../Delete/delete_MainImage.php?id=<?php echo $fetch['ImageID']?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a></td>
         
         </tr>
   

      <?php
      
    }
  ?>
</table>

    <script src="../Assest/bootstrap.bundle.min.js"></script>



<script type="text/javascript">
    function confirmationDelete(anchor) {
        var conf = confirm("Are you sure you want to delete this record?");
        if (conf) {
            window.location = $(anchor).attr("href");
        }
    }
</script>


</body>

</html>