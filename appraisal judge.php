<?php 
     require('config/config.php');
     require('config/db.php');
    /*error_reporting(0);*/

/**To check for POST to database and record information */
if(isset($_POST['submit'])){
      $useremail = $_POST['pEmail'];
      $username = $_POST['pname'];
      $gender=$_POST['pGender'];
      //For security we hash using MD5 HASH
      $userpassword = md5($_POST['userPass']);
      $usercpassword = md5($_POST['pConfirm']);

      //Check for a simple validation

      /*TODO
      Impliment verification with javascript-implement refresh after verification 
      Then also do the same for email as password with php
      Also make site undownloadable, unscrapable and other secuirty measures
      */
      if($userpassword == $usercpassword){
        //Check for existance
        $sql = "SELECT * FROM PlaintiffTbl WHERE PlaintEmail='$useremail' OR PlaintName='$username' ";
        $result = mysqli_query($conn, $sql);
        //derive id key last numbers
        $get_Idnum = "SELECT SUBSTRING(PlaintId,3) AS pltno FROM PlaintiffTbl ORDER BY PlaintId DESC LIMIT 1 ;";
        $id_res = mysqli_query($conn, $get_Idnum);
        $id_nos=mysqli_fetch_object($id_res);
        $new_id='PL'.'0'.intval($id_nos->pltno)+1;//increases by one since the last record

        if(!$result->num_rows>0){
            
                //If it works
            //Insert into database
        $sql = "INSERT INTO PlaintiffTbl(PlaintId,PlaintName,Gender,PlaintRoomKey,PlaintEmail) VALUES ('$new_id', '$username', '$gender', '$usercpassword','$useremail')";

        $result = mysqli_query($conn, $sql);

        //Check for error and call my error
        if($result){
            echo '<div class="correct"> <p>Account successfully created</p></div>';
            $username = "";
            $useremail = "";
            $usercpassword = "";
            $userpassword= "";
            $_POST['userPass']= "";
            $_POST['pConfirm']="";

            //redirects our page to home page
            echo "<script>
               setTimeout(function () {
                window.location.href= './login.php';
             
                },3000); // 3 seconds

             </script>";
        }else{
            echo '<div class="wrong"> <p>Sorry something went wrong, please try again.</p></div>';
        }

          
        }
        else
        {
          //If there is more than 0 of this record
          echo '<div class="wrong"> <p>Account with this email already exists. Log in or change password.</p></div>';
        }
        
      }
      else
      {
         echo '<div class="wrong"> <p>Sorry your passwords do not match, try again!</p></div>';
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
    <title>Sign Up | Appraisal System</title>

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
            <h2>Open Case Account</h2>
            <div class="input-section">
                <label for="pname">Formal Names</label>
                <br>
                <input type="text" name="pname" id="pname" placeholder="enter your formal name" required>
            </div>

            <div class="input-section">
                <label for="pGender">Gender</label>
                <br>
                <input type="text" name="pGender" id="pGender" placeholder="M or F" maxlength="1" required>
            </div>


            <div class="input-section">
                <label for="pEmail">Email</label>
                <br>
                <input type="text" name="pEmail" id="pEmail" placeholder="name@example.com" required>
            </div>

            <div class="input-section">
                <label for="userPass">Type New Room Key</label>
                <br>
                <input type="password" name="userPass" id="userPass" required>
            </div>

            <div class="input-section">
                <label for="pConfirm">Re-Type New Room Key</label>
                <br>
                <input type="password" name="pConfirm" id="pConfirm" required>
                <p class="greenText" id="greenVal">Passwords match successfully</p>
                <p class="redP" id="redInval">Passwords do not match</p>
            </div>

            <div class="input-section">
                <button type="submit" name="submit">Assign Room Account</button>
            </div>

            
        </form>
    </div>


    <script>
    //Do javascript validation
//Validation for both passwords and email boxes
//Registration button



//Initially set at zero to make the register button disappear
var intValidaterP = 0;
////////////////////////////////////////////////////////////////////////////////////
var password1 = document.getElementById('pConfirm');                              //
password1.addEventListener('input', validatePass);                                //
                                                                                  //
var password2 = document.getElementById('userPass');                              //
                                                                                 //
var msgPCorrect = document.getElementById('greenVal');                            //
var msgPWrong = document.getElementById('redInval');                              //
                                                                                  //
////////////////////////////////////////////////////////////////////////////////////
function validatePass(){
    //test
    var type1 = password1.value;
    var type2 = password2.value;
    /*console.log(result);*/
    if(type1 == type2){
        //Give validator value
        intValidaterP =1;
        /*
        console.log("Passwords match successfully!");*/
        msgPCorrect.style.display="block";
        msgPWrong.style.display="none";

        
    }
    else{
        //console.log("Passwords do not properly match!");
        msgPWrong.style.display="block";
        msgPCorrect.style.display="none";
    }
    
}



    

    

</script>
</body>
</html>

   