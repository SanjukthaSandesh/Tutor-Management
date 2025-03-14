<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="./css/navbar.css">
    <style>
        body {
            background: url('./image/bg1.jpg') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="./Image/wordex.png" alt="Logo Image">
            </div>
            <ul class="nav-links">
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
        </nav>
    </header>
    <body style="  background:fixed url(./image/bg1.jpg);background-size: 100%;">
<div class="body1">
    <div class="container">
        <div class="content">
          <div class="left-side">
            <div class="address details">
              <i class="fas fa-map-marker-alt"></i>
              <div class="topic">Address</div>
              <br>
              <div class="text-one">CMRIT</div>
              <div class="text-two">Bangalore</div>
            </div>
            <div class="phone details">
              <i class="fas fa-phone-alt"></i>
              <div class="topic">Phone</div>
              <br>
              <div class="text-one">+91 987654321</div>
              <div class="text-two"></div>
            </div>
            <div class="email details">
              <i class="fas fa-envelope"></i>
              <div class="topic">Email</div>
              <br>
              <div class="text-one">Paavana</div>
              <div class="text-two">paavana@gmail.com</div>
              <br>
              <div class="text-one">Sruti</div>
              <div class="text-two">sruti@gmail.com</div>
              <br>
              <div class="text-one">Shakthi</div>
              <div class="text-two">shakthi@gmail.com</div>
              <br>
              <div class="text-one">Sanjuktha</div>
              <div class="text-two">sanjuktha@gmail.com</div>
            </div>
          </div>
          <div class="right-side">
            <div class="topic-text">Send us a message</div>
            <p>If you have any work from me or any types of quries related to any Subject, you can send me message from here. It's my pleasure to help you.</p>
          <form action="" enctype="text/plain" method="post">
            <div class="input-box">
              <input name="Name " type="text" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
              <input name="E mail Address " type="text" placeholder="Enter your email" required>
            </div>
            <div class="input-box message-box">
              <textarea name="Message " id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
            </div>
            <div class="button">
              <input type="submit" value="Send Now" >
            </div>
          </form>
        </div>
        </div>
      </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>