<?php

$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "db_test.1";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if(!($conn))
    echo "Connection failed!";