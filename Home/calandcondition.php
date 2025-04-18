

    <?php
// Initialize variables
$value1 = '';
$value2 = '';
$total = '';

// Check if form is submitted
if (isset($_POST['calculate'])) {
    // Fetch form data
    $value1 = $_POST['value1'];
    $value2 = $_POST['value2'];

    // Validate numeric input
    if (is_numeric($value1) && is_numeric($value2)) {
        // Perform the calculation
        $total = $value1 * $value2;
    } else {
        // Display an error message if inputs are not numeric
        $total = 'Invalid input. Please enter numeric values.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Out Package Calculator</title>
    <link href="../Assest/styles.css" rel="stylesheet">
    <!-- Add other CSS links if needed -->
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .containers {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .forms-container,
        .reservations-container {
            width: 48%;
        }

        .forms-container form {
            max-width: 100%;
        }

        h2 {
            color: #556B2F;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            font-size: 15px;
            color: #8B4513;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        button {
            background-color: #8B4513;
            color: #FFF;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #556B2F;
        }

        p {
            margin-bottom: 10px;
        }

        .coco {
            width: 100px;
            height: 70px;
            margin-bottom: 10px;
        }

        .reservations-container {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="containers">
        <div class="forms-container">
            <form method="post" action="">
                <h2>Day Out Package Calculator</h2>

                <label for="value1">Price of Day Out Package:</label>
                <input type="text" name="value1" value="<?php echo $value1; ?>" required>

                <label for="value2">Number of Guests:</label>
                <input type="text" name="value2" value="<?php echo $value2; ?>" required>

                <button class="btn btn-reserve" type="submit" name="calculate">Calculate</button>

                <?php if ($total !== ''): ?>
                    <p>Total: <?php echo $total; ?></p>
                <?php endif; ?>
            </form>
        </div>

        <div class="reservations-container">
            <img class="coco" role="img" src="../Image/loco.png">

            <h2>TERM AND CONDITIONS</h2>
            <p>Number of customers must be more than 10.</p>
            <p>Alcohol can be brought in (outside beverages allowed).</p>
            <p>Payment must be fully paid at least 3 days before the reservation date.</p>
            <p>Cancellation of reservation must be informed at least 10 days before the reserved date.</p>
            <p>Pets are allowed.</p>
            <p>Guests can use all the property facilities without access to rooms.</p>
            <p>Tax and other expenses are all inclusive in the package price.</p>
        </div>
    </div>

    <!-- Add other scripts or include other parts of your webpage if needed -->

</body>

</html>
