<?php
$dbConnection = mysqli_connect("localhost","root","","php_new_db");

if(mysqli_connect_errno()){
    echo "Failed to connect to Mysql: ".mysqli_connect_error();
    exit();
}

//echo "successss connect";

mysqli_set_charset($dbConnection,"utf8");