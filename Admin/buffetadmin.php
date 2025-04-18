

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
    
    $buffetname = $_POST['buffetname'];
    $targetDir = "../Image/";

    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO buffet( buffetname,image) VALUES ( '$buffetname','$fileName')";
                if (mysqli_query($conn, $sql)) {
                    $msg2 = "You Uploaded is Successfully";
                } else {
                    $msg = "Error in inserting data " . "<br/>(" . $conn->error . ")";
                }
            } else {
                $msg = "Error uploading file.";
            }
        
}
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Buffet Admin</title>

    <link href="../Assest/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Assest/styletable.css" rel="stylesheet">
    
</head>


<br><br><br>
<body class="">
<div class="topic"><img class="coco" width="80" height="50" style="margin-right:100px; margin-bottom:10px; margin-left:30px;" role="img" src="../Image/loco.png"> Add Buffet Package <button class="btn btn-brown" style="margin-bottom:10px; margin-left:500px;" onclick="goBack()"><-<-Go Back</button></div>

<br>

    <main class="m-2">
        
        <div class="justify-content-center">
            <div class="container" style="max-width:700px;">
                <form action="Buffetadmin.php" method="POST" class="needs-validation" novalidate
                    enctype="multipart/form-data">
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

                        <div class="col-sm-12">
                            <label for="buffetname" class="Adding-label">Buffet Name</label>
                            <textarea class="form-control border-success" id="buffetname" name="buffetname"
                                placeholder="" value="" required></textarea>
                        </div>

                        <div class="col-12">
                            <label for="file" class="Adding-label">Image</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>

                    </div>
                    <hr class="my-4">
                    <button class="w-100 btn btn-outline-success btn-lg" name="additem" type="Submit">Continue to Add
                    </button>
                </form>
            </div>
        </div>

      
    </main>

    <?php require("conf.php");?>
<body>
<caption><h4>Buffet Table</h4></caption>
<table class="AddingTable">
  
  <thead>
    <tr>
     
    <th scope="col">Buffet Name</th>
    <th scope="col">Buffet Image</th>
    <th scope="col">Action</th>
      

    </tr>
  </thead>

                        <?php

						$query = $conn->query("SELECT * FROM `buffet`") or die(mysqli_error());
						while($fetch = $query->fetch_array()){
					?>	

      <tr>
      <td><?php echo $fetch['buffetname'] ?></td>
      <td><?php echo $fetch['image'] ?><img src = "../Image/<?php echo $fetch['image']?>" height = "50" width = "50"></td>
      <td><a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "../Delete/delete_buffet.php?id=<?php echo $fetch['ImageId']?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a></td>
         
      </tr>

      <?php
      
    }
  ?>
</table>

<script type="text/javascript">
    function confirmationDelete(anchor) {
        var conf = confirm("Are you sure you want to delete this record?");
        if (conf) {
            window.location = $(anchor).attr("href");
        }
    }
</script>

<script>
        function goBack() {
            // Specify the relevant PHP page
            var phpPage = 'PackageMain.php';
            
            // Navigate to the PHP page
            window.location.href = phpPage;
        }
    </script>

    

</body>

</html>