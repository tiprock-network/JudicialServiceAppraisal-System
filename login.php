<?php 
     require('config/config.php');
     require('config/db.php');

     if(isset($_POST['submit'])){
        $identification=$_POST['userName'];
        $password=md5($_POST['userPass']);

        //FETCH THIS INFORMATION FROM DATABASE
        $sql_plainfiff = "SELECT * FROM PlaintiffTbl WHERE (PlaintName='$identification' AND PlaintRoomKey='$password') OR (PlaintEmail='$identification' AND PlaintRoomKey='$password');";
        $result_1 = mysqli_query($conn, $sql_plainfiff); 

        //query to get advocates/ lawyers from the database
        $sql_lawyer = "SELECT * FROM LawyerTbl WHERE (LawyerName='$identification' AND LawyerRoomKey='$password') OR (LawyerEmail='$identification' AND LawyerRoomKey='$password');";
        $result_2=mysqli_query($conn,$sql_lawyer);

         //query to get judges from the database
         $sql_judge = "SELECT * FROM JudgeTbl WHERE (JudgeName='$identification' AND JudgeRoomKey='$password') OR (JudgeEmail='$identification' AND JudgeRoomKey='$password');";
         $result_3=mysqli_query($conn,$sql_judge);

        if($result_1->num_rows>0){

            $row= mysqli_fetch_assoc($result_1);
            //important to start this in every page and here
            session_start();
            //session variables
            $_SESSION['UserRole'] = $row['PlaintName']; // Set UserRole to plaintiff's name
            $_SESSION['PlaintId'] = $row['PlaintId']; // to pick relevant content
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + 2700; //45 minutes max time == 2700s
    
            echo '<div class="correct"> <p>Login successful.</p></div>';
            //Referal page after successful login
            //redirects our page to home page
            echo "<script>
               setTimeout(function () {
                window.location.href= './index.php';
             
                },3000); // 3 seconds

             </script>";
           
        }else if($result_2->num_rows>0){
            $row= mysqli_fetch_assoc($result_2);
            //important to start this in every page and here
            session_start();
            //session variables
            $_SESSION['UserRole'] = $row['LawyerName']; // Set UserRole to lawyers's name
            $_SESSION['LawyerId'] = $row['LawyerId'];// to pick relevant content
            $_SESSION['start']=time();
            $_SESSION['expire']=$_SESSION['start']+(2700); //45 minutes max time == 2700s
    
            echo '<div class="correct"> <p>Login successful.</p></div>';
            //Referal page after successful login
            //redirects our page to home page
            echo "<script>
               setTimeout(function () {
                window.location.href= './index.php';
             
                },3000); // 3 seconds

             </script>";

        }else if($result_3->num_rows>0){
            $row= mysqli_fetch_assoc($result_3);
            //important to start this in every page and here
            session_start();
            //session variables
            $_SESSION['UserRole'] = $row['JudgeName']; // Set UserRole to judge's name
            $_SESSION['JudgeId'] = $row['JudgeId'];// to pick relevant content
            $_SESSION['start']=time();
            $_SESSION['expire']=$_SESSION['start']+(2700); //45 minutes max time == 2700s
    
            echo '<div class="correct"> <p>Login successful.</p></div>';
            //Referal page after successful login
            //redirects our page to home page
            echo "<script>
               setTimeout(function () {
                window.location.href= './index.php';
             
                },3000); // 3 seconds

             </script>";

        }else{
            echo '<div class="wrong"> <p>Sorry but either your email or password is wrong, try again.</p></div>';
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
    <title>Login | Appraisal System</title>

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
            <div class="input-section">
                <label for="userName">Username or email</label>
                <br>
                <input type="text" name="userName" id="userName" placeholder="medow@mail.com">
            </div>

            <div class="input-section">
                <label for="userPass">Room Key</label>
                <br>
                <input type="password" name="userPass" id="userPass">
            </div>

            <div class="input-section">
                <button type="submit" name="submit">Open Room</button>
            </div>

            <div class="infoBox">
                <h2>JSC Appraisal Login </h2>
                <br>
                <p>Kindly use your room key to login into your court room.</p>
                <br>
                <a href="#"><p><i class="fa fa-key"></i> Forgot your key?</p></a>
                <br>
                <a href="signup.php"><p><i class="fa fa-pen"></i> Register here</p></a>
            </div>
        </form>
    </div>

</body>
</html>

   