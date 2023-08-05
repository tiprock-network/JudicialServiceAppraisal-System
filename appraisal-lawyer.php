<?php 
    session_start();
     require('config/config.php');
     require('config/db.php');
    /*error_reporting(0);*/

    //get the names of all the judges
    $law_query="SELECT * FROM LawyerTbl;";
    $res_lawyers=mysqli_query($conn,$law_query);

    //update the judges table
    if(isset($_POST['submit'])){
        $law_id=$_POST['jname'];
        //fields
        $law_timeliness_rate=$_POST['timeliness'];
        $law_serious_rate=$_POST['serious'];
        $law_integrity_rate=$_POST['integrity'];
        $law_respect_rate=$_POST['respect'];
        $law_administration_rate=$_POST['administration'];

        //get the score and the performance
        $row=mysqli_fetch_assoc($res_lawyers);
        $checks=$row['checks']+1;
        $score=$row['Score'];
        //number of questions
        $no_questions=5;
        //find the average performance on a scale of 1-5
        $performance=(($law_timeliness_rate+$law_serious_rate+$law_integrity_rate+$law_respect_rate+$law_administration_rate)/$no_questions)+$score;
        //new appraisal performance
        $law_performance=($performance)/($checks);

        //added values
        //fields
        $law_timeliness_rate=($_POST['timeliness']+$row['timeliness'])/$checks;
        $law_serious_rate=($_POST['serious']+$row['serious'])/$checks;
        $law_integrity_rate=($_POST['integrity']+$row['integrity'])/$checks;
        $law_respect_rate=($_POST['respect']+$row['respect'])/$checks;
        $law_administration_rate=($_POST['administration']+$row['administration'])/$checks;

        //create query for update
        $sql_update="UPDATE LawyerTbl SET Score= '$performance', checks='$checks', AppraisalPerf='$law_performance', timeliness='$law_timeliness_rate', serious='$law_serious_rate', integrity='$law_integrity_rate', respect='$law_respect_rate', administration='$law_administration_rate' WHERE LawyerId='$law_id';";

        //execute the query
        mysqli_query($conn,$sql_update);

        // execute the query with error handling
        if (mysqli_query($conn, $sql_update)) {
            echo '<div class="correct"> <p>Evaluation done successfully.</p></div>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="static/pictures/justice-fav.png" type="image/x-icon">
    <title>Form | Appraisal System</title>

    <script src="https://kit.fontawesome.com/912e452282.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Open+Sans:wght@700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
</head>
<style>
<?php include 'static/CSS/style.css'?>
</style>
<body>
<?php 
if (isset($_SESSION['JudgeId'])) {
?>
    <div class="accountForm">
        <form  action="" method="POST">
            <h2>Lawyer Performance Form</h2>
            <div class="input-section">
            <br>
            <input type="text" name="jname" list="lawyerList" placeholder="Type Lawyer Id or name to search">
            <datalist id="lawyerList">
                <?php while ($row = mysqli_fetch_assoc($res_lawyers)): ?>
                    <option value="<?php echo $row['LawyerId']; ?>"><?php echo $row['LawyerName'].'-'.$row['LawyerId']; ?></option>
                <?php endwhile; ?>
            </datalist>
            </div>

            <div class="input-section">
                <label for="timeliness">2. Does the lawyer deliver case confidently and professionally ?</label>
                <table class="form-table">
                    <thead>
                        <tr>
                            <th>Does Not Meet Job Expectation</th>
                            <th>Partially Meets Job Expectation</th>
                            <th>Meets Job Expectation</th>
                            <th>Meet Job Expectation Well</th>
                            <th>Exceeds Job Expectation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td><input type="radio" name="timeliness"   value="1"></td>
                        <td><input type="radio" name="timeliness"   value="2"></td>
                        <td><input type="radio" name="timeliness"   value="3"></td>
                        <td><input type="radio" name="timeliness"   value="4"></td>
                        <td><input type="radio" name="timeliness"   value="5"></td>
                    </tbody>
                </table>
                
                
            </div>


            <div class="input-section">
                <label for="serious">3. Command of relevant substantive law and procedural rules.</label>
                <table class="form-table">
                    <thead>
                        <tr>
                            <th>Does Not Meet Job Expectation</th>
                            <th>Partially Meets Job Expectation</th>
                            <th>Meets Job Expectation</th>
                            <th>Meet Job Expectation Well</th>
                            <th>Exceeds Job Expectation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td><input type="radio" name="serious"   value="1"></td>
                        <td><input type="radio" name="serious"   value="2"></td>
                        <td><input type="radio" name="serious"   value="3"></td>
                        <td><input type="radio" name="serious"   value="4"></td>
                        <td><input type="radio" name="serious"   value="5"></td>
                    </tbody>
                </table>
                
                
            </div>

            <div class="input-section">
                <label for="integrity">4. Impartiality and freedom from bias.</label>
                <table class="form-table">
                    <thead>
                        <tr>
                            <th>Does Not Meet Job Expectation</th>
                            <th>Partially Meets Job Expectation</th>
                            <th>Meets Job Expectation</th>
                            <th>Meet Job Expectation Well</th>
                            <th>Exceeds Job Expectation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td><input type="radio" name="integrity"  value="1"></td>
                        <td><input type="radio" name="integrity"  value="2"></td>
                        <td><input type="radio" name="integrity"  value="3"></td>
                        <td><input type="radio" name="integrity"  value="4"></td>
                        <td><input type="radio" name="integrity"  value="5"></td>
                    </tbody>
                </table>
                
                
            </div>

            <div class="input-section">
                <label for="respect">5. Judicial temperament that demonstrates appropriate respect for everyone in the courtroom.</label>
                <table class="form-table">
                    <thead>
                        <tr>
                            <th>Does Not Meet Job Expectation</th>
                            <th>Partially Meets Job Expectation</th>
                            <th>Meets Job Expectation</th>
                            <th>Meet Job Expectation Well</th>
                            <th>Exceeds Job Expectation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td><input type="radio" name="respect"  value="1"></td>
                        <td><input type="radio" name="respect"  value="2"></td>
                        <td><input type="radio" name="respect"  value="3"></td>
                        <td><input type="radio" name="respect"  value="4"></td>
                        <td><input type="radio" name="respect"  value="5"></td>
                    </tbody>
                </table>
                
                
            </div>

            <div class="input-section">
                <label for="administration">6. Administrative skills, including competent docket management.</label>
                <table class="form-table">
                    <thead>
                        <tr>
                            <th>Does Not Meet Job Expectation</th>
                            <th>Partially Meets Job Expectation</th>
                            <th>Meets Job Expectation</th>
                            <th>Meet Job Expectation Well</th>
                            <th>Exceeds Job Expectation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td><input type="radio" name="administration"  value="1"></td>
                        <td><input type="radio" name="administration"  value="2"></td>
                        <td><input type="radio" name="administration"  value="3"></td>
                        <td><input type="radio" name="administration"  value="4"></td>
                        <td><input type="radio" name="administration"  value="5"></td>
                    </tbody>
                </table>
                
                
            </div>


            <div class="input-section">
                <button type="submit" name="submit">Forward Score</button>
            </div>

            
        </form>
    </div>


   
</body>
</html>
<?php
}
?>

   