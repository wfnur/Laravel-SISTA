<?php
$GLOBALS['conn'] = mysqli_connect("localhost","root","jtepolban123","db_sista");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
