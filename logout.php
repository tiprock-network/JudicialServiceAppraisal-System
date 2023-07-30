<?php
session_start();
session_unset();
session_destroy();
require('config/config.php');
require('config/db.php');
//redirects our page to home page
echo "<script>
setTimeout(function () {
 window.location.href= './index.php';

 },3000); // 3 seconds

</script>";
?>