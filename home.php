<?php

session_start();

if(isset($_SESSION['user_name']) && isset($_SESSION['id'])){ ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pink</title>
    <link rel="stylesheet" style="text/css" href="style.css">
</head>
<body>
    <h1>Hello, <?php echo $_SESSION['name']?>!</h1>
    <a href="logout.php">LOGOUT</a>
</body>
</html>

<?php 
}else
    header("Location:index.php");
    exit();   
?>