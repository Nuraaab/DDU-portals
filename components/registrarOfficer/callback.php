<?php
session_start();
include '../../auth/connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['pf_name'];
    $last_name = $_SESSION['pl_name'];
    $amount = $_SESSION['amount'];
    $paywith = $_SESSION['paywith'];
    $payment_date = $_SESSION['payment_date'];
    $query = "INSERT INTO payment (first_name, last_name, amount, paywith) VALUES('$first_name', '$last_name', '$amount', '$paywith')";
    if ($conn->query($query) === TRUE) {
    $sql = "UPDATE users SET payment_status = 1, payment_date = '$payment_date', amount_due = '$amount' WHERE id = '$user_id'";
    if ($conn->query($sql) === TRUE) {
        $successMessage = "Payment successful.";
    } else {
        $errorMessage = "Error: " . $conn->error;
    }
    $conn->close();
   }else{
    $errorMessage = "Payment not updated". $conn->error;
   }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Status</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-message {
            color: green;
            font-weight: bold;
        }
        
        .error-message {
            color: red;
            font-weight: bold;
        }
        
        .back-to-home {
            margin-top: 20px;
            font-size: 16px;
        }
        
        .direction-arrow {
            display: inline-block;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="card">
        <?php if (isset($successMessage)) { ?>
            <div class="success-message"><?php echo $successMessage; ?></div>
        <?php } elseif (isset($errorMessage)) { ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php } ?>

        <div class="back-to-home">
            <span class="direction-arrow">&#8592;</span>
            <a href="http://localhost/distance-education/pages/users/student.php">Back to Home</a>
        </div>
    </div>
</body>
</html>