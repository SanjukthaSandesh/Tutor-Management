<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About WordexTutor</title>
    <link rel="stylesheet" href="css/Navbar.css">
    <link rel="stylesheet" href="css/about.css">
</head>
<body style="background:fixed url(./image/bg1.jpg);background-size: 100%;">
<?php
 include("inc/connection.inc.php");
 ob_start();
 session_start();

 if (!isset($_SESSION['user_login'])) {
     $user = "";
 } else {
     $user = $_SESSION['user_login'];
     $result = $con->query("SELECT * FROM user WHERE id='$user'");
     $get_user_name = $result->fetch_assoc();
     $uname_db = $get_user_name['fullname'];
 }
?>

<header>
<nav>
    <div class="logo">
        <img src="./image/wordex.png" alt="Logo Image">
    </div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <?php 
        if ($user != "") {
            echo '<a href="profile.php?uid='.$user.'"><button class="join-button">'.$uname_db.'</button></a>
                  <a href="logout.php"><button class="join-button">Logout</button></a>';
        } else {
            echo '<a href="login.php"><button class="join-button">Login</button></a>
                  <a href="registration.php"><button class="join-button">Register</button></a>';
        }
        ?>
    </ul>
</nav>
</header>

<div class="container">
    <h2>About WordexTutor</h2>
    <p>WordexTutor is an online tutoring platform that connects students with experienced tutors. Our goal is to provide quality education and simplify the tutor-student matching process.</p>
    
    <h3>Why Choose WordexTutor?</h3>
    <ul>
        <li>Find experienced tutors for various subjects.</li>
        <li>Seamless application process for students.</li>
        <li>Flexible and affordable tutoring options.</li>
        <li>Secure and easy-to-use platform.</li>
    </ul>

    <h3>Contact Us</h3>
    <p>If you have any queries or need assistance, feel free to reach out.</p>
    <a href="contact.php" class="contact-button">Contact Us</a>
</div>

</body>
</html>
