<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WordexTutor</title>
    <link rel="stylesheet" type="text/css" href="css/Navbar.css">
    <link rel="stylesheet" type="text/css" href="css/nfeed.css">
</head>
<body style="background: fixed url(./image/bg1.jpg); background-size: 100%;">
<?php
include("inc/connection.inc.php");
ob_start();
session_start();

$user = $_SESSION['user_login'] ?? null;
$uname_db = "";
$utype_db = "";

if ($user) {
    $result = $con->query("SELECT * FROM user WHERE id='$user'");
    
    if ($result && $result->num_rows > 0) {
        $get_user_name = $result->fetch_assoc();
        $uname_db = $get_user_name['fullname'] ?? "";
        $utype_db = $get_user_name['type'] ?? "";
    }
}

// Time ago conversion
include_once("inc/timeago.php");
$time = new timeago();
?>
<header>
<nav>
    <div class="logo">
        <img src="./Image/wordex.png" alt="Logo Image">
    </div>
    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="nav-links">
        <?php if ($utype_db == "teacher"): ?>
            <li><a href="index.php">Students</a></li>
        <?php else: ?>
            <li><a class="navlink" href="postform.php">Post</a></li>
        <?php endif; ?>

        <?php if ($user): 
            $resultnoti = $con->query("SELECT * FROM applied_post WHERE post_by='$user' AND student_ck='no'");
            $resultnoti_cnt = $resultnoti->num_rows > 0 ? "({$resultnoti->num_rows})" : ""; ?>
            <li>
                <a href="notification.php"><button class="join-button">Notification <?php echo $resultnoti_cnt; ?></button></a>
                <a href="profile.php?uid=<?php echo $user; ?>"><button class="join-button"><?php echo $uname_db; ?></button></a>
                <a href="logout.php"><button class="join-button">Logout</button></a>
            </li>
        <?php else: ?>
            <li>
                <a href="login.php"><button class="join-button">Login</button></a>
                <a href="registration.php"><button class="join-button">Register</button></a>
                <a href="about.php"><button class="join-button">About Us</button></a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
</header>
<div class="container">
    <div class="nbody">
        <div class="nfeedleft">
            <?php
            $todaydate = date("Y-m-d"); // Changed format to YYYY-MM-DD for consistency

            $query = $con->query("SELECT * FROM post ORDER BY id DESC");
            while ($row = $query->fetch_assoc()) {
                $post_id = $row['id'];
                $postby_id = $row['postby_id'];
                $sub = str_replace(",", ", ", $row['subject']);
                $class = str_replace(",", ", ", $row['class']);
                $salary = $row['salary'];
                $location = str_replace(",", ", ", $row['location']);
                $p_university = $row['p_university'];
                $post_time = $row['post_time'];
                $deadline = $row['deadline'];
                $medium = str_replace(",", ", ", $row['medium']);

                // Fetch user details of the post owner
                $query1 = $con->query("SELECT * FROM user WHERE id='$postby_id'");
                $user_fname = $query1->fetch_assoc() ?? [];

                $uname_db = $user_fname['fullname'] ?? "";
                $pro_pic_db = $user_fname['user_pic'] ?? "";
                $ugender_db = $user_fname['gender'] ?? "";

                // Set default profile picture
                if (empty($pro_pic_db)) {
                    $pro_pic_db = ($ugender_db == "male") ? "malepic.png" : "femalepic.png";
                } elseif (!file_exists("image/profilepic/" . $pro_pic_db)) {
                    $pro_pic_db = ($ugender_db == "male") ? "malepic.png" : "femalepic.png";
                }

                echo '<div class="nfbody">
                    <center><div class="st_prof">';

                if ($user && $utype_db == 'student') {
                    // Student cannot apply
                } else {
                    if (strtotime($deadline) < strtotime($todaydate)) {
                        echo '<input type="submit" style="background:red; color:white; margin-bottom:5px;" class="sub_button" value="Deadline Over" />';
                    } else {
                        $resultpostcheck = $con->query("SELECT * FROM applied_post WHERE post_id='$post_id' AND applied_by='$user'");
                        $query_apply_cnt = $resultpostcheck->num_rows;
                        
                        if ($query_apply_cnt > 0) {
                            echo '<input type="submit" style="background:yellow; color:gray; margin-bottom:5px;" class="sub_button" value="Already Applied" />';
                        } else {
                            echo '<form action="viewpost.php?pid=' . $post_id . '" method="post">
                                <input type="submit" class="sub_button" value="Apply" style="background: rgba(0, 128, 0, 0.445); color:white; cursor:pointer; margin-bottom:5px;" />
                            </form>';
                        }
                    }
                }

                echo '<div class="prof-pic">
                    <br><img src="image/profilepic/' . $pro_pic_db . '" width="50px" height="50px">
                    </div><br>
                    <div class="p_nmdate">
                        <h4>' . $uname_db . '</h4><br>
                        <h5><a class="c_ptime" href="viewpost.php?pid=' . $post_id . '">' . $time->time_ago($post_time) . '</a> &nbsp;|&nbsp; Deadline: ' . $deadline . '</h5><br>
                    </div>
                </div><br>
                <table class="table-data">
                    <tr><th>Subject:</th> <td>' . $sub . '</td></tr>
                    <tr><th>Class:</th> <td>' . $class . '</td></tr>
                    <tr><th>Medium:</th> <td>' . $medium . '</td></tr>
                    <tr><th>Salary:</th> <td>' . $salary . '</td></tr>
                    <tr><th>Location:</th> <td>' . $location . '</td></tr>
                    <tr><th>University:</th> <td>' . $p_university . '</td></tr>
                </table>
            </div></center>';
            }
            ?>
        </div>
    </div>
</div>
<div class="footer"></div>
<script src="./js/script.js"></script>
</body>
</html>
