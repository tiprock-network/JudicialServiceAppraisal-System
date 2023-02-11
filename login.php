<?php 
    require('config/db.php'); 
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
        <form action="">
            <div class="input-section">
                <label for="userName">Username or email</label>
                <input type="text" name="userName" id="userName">
            </div>

            <div class="input-section">
                <label for="userPass">Password</label>
                <input type="text" name="userPass" id="userPass">
            </div>

            <div class="input-section">
                <button type="submit">Sign In</button>
            </div>
        </form>
    </div>

</body>
</html>

   