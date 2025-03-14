<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/Navbar.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<?php
$con = new mysqli('localhost', 'root', '', 'tutor_management');

if ($con->connect_errno > 0) {
    die('Unable to connect to database [' . $con->connect_error . ']');
}

ob_start();
session_start();

if (isset($_SESSION['user_login'])) {
    header("location: index.php");
    exit();
}

$u_fname = $_GET['full_name'] ?? '';
$u_email = $_GET['email'] ?? '';
$u_mobile = $_GET['mobile'] ?? '';
$u_ac = $_GET['account'] ?? '';
$u_gender = $_GET['gender'] ?? '';

?>
<nav>
    <div class="logo">
        <img src="./Image/wordex.png" alt="Logo Image">
    </div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <a href="login.php"><button class="join-button">Login</button></a>
        <a href="about.php"><button class="join-button">About Us</button></a>
    </ul>
</nav>

<body style="background:fixed url(./image/bg1.jpg);background-size: 100%;">
<div class="nbody">
    <center>
        <div class="main"> 
            <form class="form" action="payment.php" method="get">
                <h1>Register New Account</h1>
                <div class="ac_type">
                    <input type="radio" value="teacher" id="radioOne" name="account" checked><p>As a Teacher (₹499)</p>
                    <input type="radio" value="student" id="radioTwo" name="account"><p>As a Student (₹199)</p>
                </div>
                <input type="text" name="full_name" id="name" placeholder="Enter Your Full Name" value="<?php echo $u_fname; ?>" required>
                <input type="email" name="email" id="name" placeholder="Enter Your Email Address" value="<?php echo $u_email; ?>" required>
                <input type="number" name="mobile" id="name" placeholder="Enter Phone number" value="<?php echo $u_mobile; ?>" required>

                

                <!-- Password Fields -->
                <input type="password" name="password" id="password" placeholder="Create Password" required>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Your Password" required>

				<div class="gender">
                    <p id="genderp">Select Gender: </p>
                    <input type="radio" name="gender" id="male" value="male" checked><p>Male</p>
                    <input type="radio" name="gender" id="female" value="female"><p>Female</p>
                </div>

                <!-- Payment Button -->
                <input type="hidden" name="amount" id="paymentAmount">
				<button type="submit" id="proceedToPayment" style="background-color:#007BFF; color:white; font-size:20px; padding:15px 30px; border:none; border-radius:8px; width:100%; text-align:center; display:block; margin-top:20px; cursor:pointer;">
    				Proceed to Payment
				</button>

            </form>
        </div>
    </center>
</div>

<script src="js/validation.js"></script> <!-- External JS file for validation -->
<script>
document.getElementById("proceedToPayment").addEventListener("click", function(event) {
    var accountType = document.querySelector('input[name="account"]:checked').value;
    var amount = (accountType === "student") ? 199 : 499;
    document.getElementById("paymentAmount").value = amount;
});
</script>
</body>
</html>
