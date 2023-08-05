<?php
session_start();
error_reporting(0);
//
include 'inc/header.php'
?>
<?php
require('config/config.php');
require('config/db.php');
?>

<div class="mainContainer">
    <h2 style="color:#333;">Services</h2>
    <div class="cards-box">
        <a href="appraisal.php">
        <div class="card">
            <img src="./static/pictures/lawyer.jpg" alt="">
            <div class="head"><p>Judge Appraisal</p></div>
        </div>
        </a>

        <a href="appraisal-lawyer.php">
        <div class="card">
            <img src="./static/pictures/judge.jpg" alt="">
            <div class="head"><p>Lawyer Appraisal</p></div>
        </div>
        </a>
        
    </div>
</div>


<!--Body Code Ends Here-->

<!--Footer Code Starts Here-->
<?php include 'inc/footer.php'?>