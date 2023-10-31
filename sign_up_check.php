<?php

session_start();
include "db_conn.php";

if(isset ($_POST['name']) && isset ($_POST['uname']) &&
isset ($_POST['password']) && isset ($_POST['re_password'])){
    
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

$name = validate($_POST['name']);
$uname = validate($_POST['uname']);

$pass = validate($_POST['password']);
$re_pass = validate($_POST['re_password']);

$user_data= "uname=". $uname. "&name=". $name;

if(empty($name)){
    header("Location:sign_up.php?error=Name is required.&$user_data");
    exit();
}else if(empty($uname)){
    header("Location:sign_up.php?error=User Name is required.&$user_data");
    exit();
}else if(empty($pass)){
    header("Location:sign_up.php?error=Password is required.&$user_data");
    exit();
}else if(empty($re_pass)){
    header("Location:sign_up.php?error=Re Password is required.&$user_data");
    exit();
}else if($pass !== $re_pass){
    header("Location:sign_up.php?error=The confirmation password does not match.&$user_data");
    exit();
}else{

    $pass = md5($pass);
    
    $sql="SELECT* FROM users WHERE user_name = '$uname' ";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) >0){
        header("Location:sign_up.php?error=The username is taken try another.");
        exit();
    }else{
        $sql2="INSERT INTO users (user_name, password, name) VALUES
        ('$uname', '$pass', '$name')";

        $result2 = mysqli_query($conn, $sql2);
        
        if($result2){
            header("Location:sign_up.php?success=Your account has been created succesfully.&$user_data");
            exit();
        }else{
            header("Location:sign_up.php?error=unknown error occured.&$user_data");
            exit();
        } 
    }
        

}

}else{
    header("Location:sign_up.php");
    exit();
}