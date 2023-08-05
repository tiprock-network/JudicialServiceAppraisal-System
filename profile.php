<!--Header Code-->
<?php 
//Session for all pages
    
session_start();
//error_reporting(0);
//
include 'inc/header.php'
?>
<?php 

   require('config/config.php');
   require('config/db.php');
   /*error_reporting(0);*/
   // Initialize the variables
    $plaint_id = null;
    $lawyer_id = null;
    $judge_id = null;

    if (isset($_SESSION['PlaintId'])) {
        $plaint_id = $_SESSION['PlaintId'];
    }

    if (isset($_SESSION['LawyerId'])) {
        $lawyer_id = $_SESSION['LawyerId'];
    }

    if (isset($_SESSION['JudgeId'])) {
        $judge_id = $_SESSION['JudgeId'];
    }
  
   //echo $_SESSION['PlaintName'];
   //queries to get data
   $query_plaint= "SELECT * FROM plaintiffTbl WHERE PlaintId='$plaint_id'; ";
   $query_lawyer= "SELECT * FROM lawyerTbl WHERE LawyerId='$lawyer_id'; ";
   $query_judge= "SELECT * FROM judgeTbl WHERE JudgeId='$judge_id'; ";

   //get all plaintiff user data
   //fetch the result
   $res_plaint=mysqli_query($conn,$query_plaint);

   //fetching all with an associative array
   $cases_plaint=mysqli_fetch_assoc($res_plaint); 
   
  

   //get all lawyer user data
   //fetch the result
   $res_lawyer=mysqli_query($conn,$query_lawyer);

   //fetching all with an associative array
   $cases_lawyer=mysqli_fetch_assoc($res_lawyer); 
   
   


   //get all judge user data
   //fetch the result
   $res_judge=mysqli_query($conn,$query_judge);

   //fetching all with an associative array
   $cases=mysqli_fetch_assoc($res_judge); 
   
   

   //close the connection
   mysqli_close($conn);
?>
<!--Header Code Ends Here-->

<!--Body Code Starts Here-->
<div class="showcase">
    <button>Performance</button>
    <div class="intro">
        <h1>Judicial System</h1>
        <p>Welcome to Milimani Law Courts Judicial Appraisal System</p>
    </div>
</div>

<div class="mainContainer">
   

<?php 
if (mysqli_num_rows($res_plaint) > 0) {
    echo "This page is not available.";
} else if (mysqli_num_rows($res_lawyer) > 0) {
?>
<div class="casebox">
        <div class="caseHead">
            <p>
                <?php echo $cases_lawyer['LawyerName']; ?>
            </p>
            <sup><?php echo $cases_lawyer['LawyerId']?></sup>
        </div>
        <div class="caseDesc">
            <?php echo $cases_lawyer['DeptId']; ?>
        </div>
        <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases_lawyer['AppraisalPerf']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Overall Rating: <?php echo round($cases_lawyer['AppraisalPerf'],1).'/5'; ?></div>
        </div>
        <br>
        <br>
        <div class="caseHead">
            <p>
                Evaluation Scores - Total Participants [<?php echo $cases_lawyer['checks']?>]
            </p>
            <br>
            <p>Completion Rate of Cases in time</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases_lawyer['timeliness']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases_lawyer['timeliness'],1).'/5'; ?>  - Percentage: <?php echo round(($cases_lawyer['timeliness']/5)*100,1).'%'; ?></div>
            </div>

    
            <br>
            <p>Command of relevant substantive law and procedural rules</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases_lawyer['serious']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases_lawyer['serious'],1).'/5'; ?>  - Percentage: <?php echo round(($cases_lawyer['serious']/5)*100,1).'%'; ?></div>
            </div>

            <br>
            <p>Impartiality and freedom from bias</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases_lawyer['integrity']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases_lawyer['integrity'],1).'/5'; ?>  - Percentage: <?php echo round(($cases_lawyer['integrity']/5)*100,1).'%'; ?></div>
            </div>

            <br>
            <p>Respect for everyone in the courtroom</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases_lawyer['respect']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases_lawyer['respect'],1).'/5'; ?>  - Percentage: <?php echo round(($cases_lawyer['respect']/5)*100,1).'%'; ?></div>
            </div>

            <br>
            <p>Administration</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases_lawyer['administration']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases_lawyer['administration'],1).'/5'; ?>  - Percentage: <?php echo round(($cases_lawyer['administration']/5)*100,1).'%'; ?></div>
            </div>
            
        </div>
    </div>



<?php

} else if (mysqli_num_rows($res_judge) > 0) {
    
?>

<div class="casebox">
        <div class="caseHead">
            <p>
                <?php echo $cases['JudgeName']; ?>
            </p>
            <sup><?php echo $cases['JudgeId']?></sup>
        </div>
        <div class="caseDesc">
            <?php echo $cases['DeptId']; ?>
        </div>
        <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases['AppraisalPerf']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Overall Rating: <?php echo round($cases['AppraisalPerf'],1).'/5'; ?></div>
        </div>
        <br>
        <br>
        <div class="caseHead">
            <p>
                Evaluation Scores - Total Participants [<?php echo $cases['checks']?>]
            </p>
            <br>
            <p>Completion Rate of Cases in time</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases['timeliness']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases['timeliness'],1).'/5'; ?>  - Percentage: <?php echo round(($cases['timeliness']/5)*100,1).'%'; ?></div>
            </div>

    
            <br>
            <p>Command of relevant substantive law and procedural rules</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases['serious']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases['serious'],1).'/5'; ?>  - Percentage: <?php echo round(($cases['serious']/5)*100,1).'%'; ?></div>
            </div>

            <br>
            <p>Impartiality and freedom from bias</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases['integrity']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases['integrity'],1).'/5'; ?>  - Percentage: <?php echo round(($cases['integrity']/5)*100,1).'%'; ?></div>
            </div>

            <br>
            <p>Respect for everyone in the courtroom</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases['respect']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases['respect'],1).'/5'; ?>  - Percentage: <?php echo round(($cases['respect']/5)*100,1).'%'; ?></div>
            </div>

            <br>
            <p>Administration</p>
            <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($cases['administration']/5)*100),0);?>%"></div></div></div>
            <div class="progress">Rating: <?php echo round($cases['administration'],1).'/5'; ?>  - Percentage: <?php echo round(($cases['administration']/5)*100,1).'%'; ?></div>
            </div>
            
        </div>
    </div>



<?php

} else {
    echo "No cases available.";
}
?>

</div>


<!--Body Code Ends Here-->

<!--Footer Code Starts Here-->
<?php include 'inc/footer.php'?>
<!--Footer Code Ends Here-->