
<?php
require_once '../Admin/conf.php';

if (isset($_REQUEST['id'])) {
    $ImageId = $_REQUEST['id'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM `packagecater` WHERE `ImageId` = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("i", $ImageId);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("location:../Admin/DayoutPacAdmin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<?php
require_once 'conf.php';

if (isset($_REQUEST['ImageId'])) {
    $ImageId = $_REQUEST['ImageId'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM `buffet` WHERE `ImageId` = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("i", $ImageId);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("location:buffetadmin.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


