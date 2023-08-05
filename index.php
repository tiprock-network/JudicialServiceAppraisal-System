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
   $query_plaint= "SELECT * FROM CaseTbl WHERE PlaintId='$plaint_id'; ";
   $query_lawyer= "SELECT * FROM CaseTbl WHERE LawyerId='$lawyer_id'; ";
   $query_judge= "SELECT * FROM CaseTbl WHERE JudgeId='$judge_id'; ";

   //get all plaintiff user data
   //fetch the result
   $res_plaint=mysqli_query($conn,$query_plaint);

   //fetching all with an associative array
   $cases_plaint=mysqli_fetch_all($res_plaint,MYSQLI_ASSOC); 
   
  

   //get all lawyer user data
   //fetch the result
   $res_lawyer=mysqli_query($conn,$query_lawyer);

   //fetching all with an associative array
   $cases_lawyer=mysqli_fetch_all($res_lawyer,MYSQLI_ASSOC); 
   
   


   //get all judge user data
   //fetch the result
   $res_judge=mysqli_query($conn,$query_judge);

   //fetching all with an associative array
   $cases=mysqli_fetch_all($res_judge,MYSQLI_ASSOC); 
   
   

   //close the connection
   mysqli_close($conn);
?>
<!--Header Code Ends Here-->

<!--Body Code Starts Here-->
<div class="showcase">
    <button>Get Started Here</button>
    <div class="intro">
        <h1>Judicial System</h1>
        <p>Welcome to Milimani Law Courts Judicial Appraisal System</p>
    </div>
</div>

<div class="mainContainer">
    <div class="details">
        <div class="mainContent">
         <p>This open portal allows you to choose a range of services based on your agenda. Please explore the appropriate categories as given as per your court customer. For extra help contact the support staff.</p>
        </div>
        <div class="buttonBox">
          <a href="signup.php"><button>Create an account here</button></a>
        </div>
    </div>


    <br>
    <br>
    <div class="navbar" id="navbarholder">
        <br>
    <ul>
        <li class="navitem active2">Land</li>
        <li class="navitem">Kadhis</li>
        <li class="navitem">Lands</li>
        <li class="navitem">Family</li>
        <li class="navitem">Military</li>
    </ul>
</div>

<!--Content list of Cases-->
<?php 
if (mysqli_num_rows($res_plaint) > 0) {
    foreach ($cases_plaint as $case) :
        ?>
        <div class="casebox">
            <div class="caseHead">
                <p>
                    ID: <?php echo $case['CaseId']; ?> 
                    <?php echo $case['CaseName']; ?>
                </p>
                <sup><?php echo $case['LawyerId']?></sup>
            </div>
            <div class="caseDesc">
                <?php echo $case['CaseDesc']; ?>
            </div>
            <div class="caseProgress">
                <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($case['No_of_hearings']/$case['No_of_complete_hearings'])*100),0);?>%"></div></div></div>
                <div class="progress"><?php echo round((($case['No_of_hearings']/$case['No_of_complete_hearings'])*100),0); ?> % Progress</div>
            </div>
        </div>
    <?php
    endforeach;
} else if (mysqli_num_rows($res_lawyer) > 0) {
    foreach ($cases_lawyer as $case) :
        ?>
        <div class="casebox">
            <div class="caseHead">
                <p>
                    ID: <?php echo $case['CaseId']; ?> 
                    <?php echo $case['CaseName']; ?>
                </p>
                <sup><?php echo $case['LawyerId']?></sup>
            </div>
            <div class="caseDesc">
                <?php echo $case['CaseDesc']; ?>
            </div>
            <div class="caseProgress">
                <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($case['No_of_hearings']/$case['No_of_complete_hearings'])*100),0);?>%"></div></div></div>
                <div class="progress"><?php echo round((($case['No_of_hearings']/$case['No_of_complete_hearings'])*100),0); ?> % Progress</div>
            </div>
        </div>
    <?php
    endforeach;
} else if (mysqli_num_rows($res_judge) > 0) {
    foreach ($cases as $case) :
        ?>
        <div class="casebox">
            <div class="caseHead">
                <p>
                    ID: <?php echo $case['CaseId']; ?> 
                    <?php echo $case['CaseName']; ?>
                </p>
                <sup><?php echo $case['LawyerId']?></sup>
            </div>
            <div class="caseDesc">
                <?php echo $case['CaseDesc']; ?>
            </div>
            <div class="caseProgress">
                <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($case['No_of_hearings']/$case['No_of_complete_hearings'])*100),0);?>%"></div></div></div>
                <div class="progress"><?php echo round((($case['No_of_hearings']/$case['No_of_complete_hearings'])*100),0); ?> % Progress</div>
            </div>
        </div>
    <?php
    endforeach;
} else {
    echo "No cases available.";
}
?>

<!--Content list end-->

</div>


<!--Body Code Ends Here-->

<!--Footer Code Starts Here-->
<?php include 'inc/footer.php'?>
<!--Footer Code Ends Here-->