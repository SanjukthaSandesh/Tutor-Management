<?php
session_start();
include("inc/connection.inc.php");

// Get user details from GET parameters
$amount = $_GET['amount'] ?? 0;
$full_name = $_GET['full_name'] ?? '';
$email = $_GET['email'] ?? '';
$mobile = $_GET['mobile'] ?? '';
$account = $_GET['account'] ?? ''; // 'student' or 'tutor'
$gender = $_GET['gender'] ?? '';
$password = $_GET['password'] ?? '';

// Validate payment amount
if ($amount != 199 && $amount != 499) {
    die("Invalid payment amount.");
}

// When the user clicks 'Pay Now'
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_status = "Completed";

    // Hash the user's password before storing
    $hashed_password = md5($password); // Using MD5 (Consider using bcrypt for better security)

    // Check if the user already made a payment
    $check_payment = $con->query("SELECT * FROM payments WHERE email='$email' AND status='Completed'");
    if ($check_payment->num_rows == 0) {
        // Store payment details in the payments table
        $con->query("INSERT INTO payments (email, amount, status, payment_date) VALUES ('$email', '$amount', '$payment_status', NOW())");

        // Check if user is already registered
        $check_user = $con->query("SELECT * FROM user WHERE email='$email'");
        if ($check_user->num_rows == 0) {
            // Generate a confirmation code
            $confirmCode = mt_rand(100000, 999999);

            // Insert user into `user` table
            $insert_user = "INSERT INTO user (fullname, gender, email, phone, pass, type, confirmcode) 
                            VALUES ('$full_name', '$gender', '$email', '$mobile', '$hashed_password', '$account', '$confirmCode')";
            $con->query($insert_user);
            $user_id = $con->insert_id; // Get the last inserted user ID

            // If user is a tutor, insert additional details into the `tutor` table
            if ($account == "tutor") {
                $insert_tutor = "INSERT INTO tutor (t_id, inst_name, prefer_sub, class, medium, prefer_location, salary) 
                                 VALUES ('$user_id', '', '', '', '', '', '')";
                $con->query($insert_tutor);
            }
        }

        // Redirect to login page
        header("Location: login.php?registered=1");
        exit();
    } else {
        echo "Payment already completed. <a href='login.php'>Click here to log in</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="css/payment.css">
</head>
<body>
    <div class="container">
        <h2>Complete Your Payment</h2>
        <p>Pay ₹<?php echo $amount; ?> to complete registration.</p>
        <form method="post">
            <button type="submit" class="big-pay-button">Pay Now</button>
        </form>
    </div>
</body>
</html>
