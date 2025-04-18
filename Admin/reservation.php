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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Reservation details</title>
    <link href="../Assest/bootstrap.min.css" rel="stylesheet">
    <link href="../Assest/styletable.css" rel="stylesheet">
</head>
<style>
   

.container {
    width: 80%;
    margin: 20px auto;
}

.tables {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.tables caption {
    text-align: left;
    font-size: 1.5rem;
    padding: 10px;
    font-weight: bold;
}

.tables thead {
    background-color: #343a40;
    color: #fff;
}

.tables th, .table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

.tables td {
    vertical-align: middle;
}


.search-form {
    display: flex;
    margin-bottom: 20px;
}

.form-control {
    padding: 8px;
    margin-right: 8px;
}

.btn-primary {
    background-color: Green;
    color: #fff;
    border: none;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
    border-radius: 4px;
}

.delete-btn {
    background-color: #dc3545;
    color: #fff;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 4px;
}

.delete-btn:hover {
    background-color: #c82333;
}

</style>
<body>

<?php include ("navbonlyadmin.php") ?>
<br><br><br>
<div class="topic"><img class="coco" width="80" height="50" style="margin-right:100px; margin-bottom:10px; margin-left:30px;" role="img" src="../Image/loco.png">Customer Reservation Details - Day Out Package 
<button class="btn btn-brown" style="margin-bottom:10px; margin-left:100px;" onclick="goBack('reservation.php')">REFRESH</button>
<button class="btn btn-brown"style="margin-bottom:10px;"onclick="goBack('view.php')"><-<-GO BACK</button>
</div>

  
        <br>

<div class="container">
    <form action="" method="post" class="search-form">
        <input type="text" class="form-control" name="date" placeholder="Search by Date">
        <input type="text" class="form-control" name="contactNumber" placeholder="Search by Contact Number">
        <input type="text" class="form-control" name="email" placeholder="Search by Email">
        <button type="submit" class="btn btn-primary" name="search">Search</button>
    </form>

    <table class="tables">
       
        <thead>
            <tr>
                <th scope="col">Customer Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Package Name</th>
                <th scope="col">Buffet Name</th>
                <th scope="col">Number Of Package</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
if (isset($_POST['search'])) {
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $date = $_POST['date'];

    $conditions = [];

    if (!empty($contactNumber)) {
        $conditions[] = "contact = '$contactNumber'";
    }

    if (!empty($email)) {
        $conditions[] = "email = '$email'";
    }

    if (!empty($date)) {
        $conditions[] = "date = '$date'";
    }

    $conditionStr = implode(" OR ", $conditions);

    // Add ORDER BY clause to sort by date in descending order
    $query = $conn->query("SELECT * FROM `bookings` WHERE $conditionStr ORDER BY date DESC") or die(mysqli_error());
} else {
    // Add ORDER BY clause to sort by date in descending order
    $query = $conn->query("SELECT * FROM `bookings` ORDER BY date DESC") or die(mysqli_error());
}

while ($fetch = $query->fetch_array()) {
?>
    <tr>
        <td><?php echo $fetch['name'] ?></td>
        <td><?php echo $fetch['email'] ?></td>
        <td><?php echo $fetch['date'] ?></td>
        <td><?php echo $fetch['contact'] ?></td>
        <td><?php echo $fetch['catergoryname'] ?></td>
        <td><?php echo $fetch['buffetname'] ?></td>
        <td><?php echo $fetch['num_packages'] ?></td>
        <td>
            <a class="delete-btn" onclick="confirmationDelete(this); return false;" href="../Delete/delete_reservation.php?id=<?php echo $fetch['Id'] ?>">
                Delete
            </a>
        </td>
    </tr>
<?php } ?>

        </tbody>
    </table>
</div>

<script src="../js/jquery.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    function confirmationDelete(anchor){
        var conf = confirm("Are you sure you want to delete this record?");
        if(conf){
            window.location = anchor.attr("href");
        }
    } 
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".table").DataTable({
            "paging": false // Disable pagination
        });
    });
</script>

<script>
    function goBack(phpPage) {
        // Navigate to the specified PHP page
        window.location.href = phpPage;
    }
</script>



</body>
</html>