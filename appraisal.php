<?php 
     require('config/config.php');
     require('config/db.php');
    /*error_reporting(0);*/

    //get the names of all the judges
    $judge_query="SELECT * FROM JudgeTbl;";
    $res_judges=mysqli_query($conn,$judge_query);

    //update the judges table
    if(isset($_POST['submit'])){
        $judge_id=$_POST['jname'];
        $judge_timeliness_rate=(double)$_POST['timeliness'];
        $judge_serious_rate=(double)$_POST['serious'];
        //get the score and the performance
        $row=mysqli_fetch_assoc($res_judges);
        $checks=$row['checks'];
        $score=$row['Score'];
        //number of questions
        $no_questions=2;
        //find the average performance on a scale of 1-5
        $performance=($judge_timeliness_rate+$judge_serious_rate)/$no_questions;
        //new appraisal performance
        $judge_performance=($score+$performance)/($checks+1);

        //create query for update
        $sql_update="UPDATE JudgeTbl SET Score= Score+'$performance', checks=checks + 1, AppraisalPerf='$judge_performance' WHERE JudgeId='$judge_id';";
        //execute the query
        mysqli_query($conn,$sql_update);
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
    <div class="accountForm">
        <form id="login-form" action="" method="POST">
            <h2>Judge Performance Form</h2>
            <div class="input-section">
                <label for="jname">Choose the name of the judge against their IDs</label>
                <br>
                <input type="text" name="jname" id="jname" list="judgeList">
                <datalist id="judgeList">
                    <?php while ($row = mysqli_fetch_assoc($res_judges)): ?>
                        <option value="<?php echo $row['JudgeId']; ?>"><?php echo $row['JudgeName']; ?></option>
                    <?php endwhile; ?>
                </datalist>
            </div>

            <div class="input-section">
                <label for="timeliness">Does the judge deliver judgement in time ?</label>
                <table class="form-table">
                    <thead>
                        <tr>
                            <th>Very Poor</th>
                            <th>Poor</th>
                            <th>Fair</th>
                            <th>Good</th>
                            <th>Excellent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td><input type="radio" name="timeliness" id="timeliness"  value="1"></td>
                        <td><input type="radio" name="timeliness" id="timeliness"  value="2"></td>
                        <td><input type="radio" name="timeliness" id="timeliness"  value="3"></td>
                        <td><input type="radio" name="timeliness" id="timeliness"  value="4"></td>
                        <td><input type="radio" name="timeliness" id="timeliness"  value="5"></td>
                    </tbody>
                </table>
                
                
            </div>


            <div class="input-section">
                <label for="serious">Does the judge approach cases with high level of seriousness ?</label>
                <table class="form-table">
                    <thead>
                        <tr>
                            <th>Very Poor</th>
                            <th>Poor</th>
                            <th>Fair</th>
                            <th>Good</th>
                            <th>Excellent</th>
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
                <button type="submit" name="submit">Forward Score</button>
            </div>

            
        </form>
    </div>


   
</body>
</html>

   