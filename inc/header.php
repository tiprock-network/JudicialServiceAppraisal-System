<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="static/pictures/justice-fav.png" type="image/x-icon">
    <title>Appraisal System</title>

    <script src="https://kit.fontawesome.com/912e452282.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Open+Sans:wght@700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<style>
<?php include 'static/CSS/style.css'?>
</style>
<body>
    <div class="header">
    <div class="container1"> <h1> <i class="fa fa-scale-balanced"></i> Milimani Appraisal System</h1></div>
    
    
    <nav>
        
        <ul id="navItems">
            <li class="listItem active"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li  class="listItem"><a href="services.php"><i class="fa fa-envelope-open-text"></i> Services</a></li>
            <li  class="listItem"><a href="#"><i class="fa fa-download"></i> Downloads</a></li>
            <li  class="listItem"><a href="#"><i class="fa fa-headset"></i> Contact Us</a></li>
            <li  class="listItem"><a href="login.php">
            <?php
                if (!isset($_SESSION['UserRole'])) {
                    echo '<i class="fa fa-user-plus"></i>';
                } else {
                    echo '<a href="#">';

                    if (isset($_SESSION['LawyerId'])) {
                        echo '<i class="fa fa-user-check"></i>' . $_SESSION['UserRole'] . '</a> ';
                        echo '<a href="profile.php?id=' . $_SESSION['LawyerId'] . '" style="color:#333; margin-left: 15px;">Profile</a>';
                    } else if (isset($_SESSION['JudgeId'])) {
                        echo '<i class="fa fa-user-check"></i>' . $_SESSION['UserRole'] . '</a> ';
                        echo '<a href="profile.php?id=' . $_SESSION['JudgeId'] . '" style="color:#333; margin-left: 15px;">Profile</a>';
                    } else if (isset($_SESSION['PlaintId'])) {
                        echo '<i class="fa fa-user-check"></i>' . $_SESSION['UserRole'] . '</a> ';
                        echo '<a href="profile.php?id=' . $_SESSION['PlaintId'] . '" style="color:#333; margin-left: 15px;">Profile</a>';
                    }

                    if (isset($_SESSION['start']) && isset($_SESSION['expire'])) {
                        $current_time = time();
                        if ($current_time > $_SESSION['expire']) {
                            session_unset();
                            session_destroy();
                            //redirects our page to home page
                            echo "<script>
                            setTimeout(function () {
                                window.location.href= './index.php';
                            }, 3000); // 3 seconds
                            </script>";
                        }
                    }
                }
            ?>
            </a></li>
        </ul>
    </nav>
    </div>
    
    
    
    