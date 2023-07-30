<?php 
$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if(mysqli_connect_error()){
    echo 'Connection failed with error: '.mysqli_connect_errno();
}
?>