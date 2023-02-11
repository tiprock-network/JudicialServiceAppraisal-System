<!--Header Code-->
<?php include 'inc/header.php'?>
<?php 
   require('config/db.php');

   $query= 'SELECT * FROM CaseTbl';

   //fetch the result
   $res=mysqli_query($conn,$query);

   //fetching all with an associative array
   $cases=mysqli_fetch_all($res,MYSQLI_ASSOC); 
   
   //free result
   mysqli_free_result($res);

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
         <p>This open portal allows you to choose a range of services based on your ajenda. Please explore the appropriate categories as given as per your court customer. For extra help contact the support staff.</p>
        </div>
        <div class="buttonBox">
          <a href=""><button>Create an account here</button></a>
        </div>
    </div>


    <br>
    <br>
    <div class="navbar" id="navbarholder">
    <ul>
        <li class="navitem active2">Land</li>
        <li class="navitem">Kadhis</li>
        <li class="navitem">Lands</li>
        <li class="navitem">Family</li>
        <li class="navitem">Military</li>
    </ul>
</div>

<!--Content list of Cases-->
<?php foreach($cases as $case):?>
    <div class="casebox">
        <div class="caseHead">
        <p>
        ID: <?php echo $case['CaseId']; ?> 
        <?php echo $case['CaseName']; ?>
        </p>
    </div>
        <div class="caseDesc">
        <?php echo $case['CaseDesc']; ?>
        </div>
        <div class="caseProgress">
            <div class="progressbarBox"><div class="progressbar"><div class="bar" style="width: <?php echo round((($case['No_of_hearings']/$case['No_of_complete_hearings'])*100),0);?>%"></div></div></div>
            <div class="progress"><?php echo round((($case['No_of_hearings']/$case['No_of_complete_hearings'])*100),0); ?> % Progress</div>
        </div>
    </div>
<?php endforeach ?>
</div>


<!--Body Code Ends Here-->

<!--Footer Code Starts Here-->
<?php include 'inc/footer.php'?>
<!--Footer Code Ends Here-->