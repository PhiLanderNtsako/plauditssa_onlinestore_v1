<?php 
    session_start();
    include "../includes/dbConfig.php";

    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM admin WHERE admin_username = '$username' and admin_password = '$password'";
    $quser = $conn->query($sql);
    $rowuser = $quser->fetch_assoc();

    if(!empty($rowuser)){
        $_SESSION['adminID'] = $username;
        echo '<meta http-equiv="refresh" content="0; https://admin.plauditssa.co.za/index.php">';
    }else{
        echo '<meta http-equiv="refresh" content="0; https://admin.plauditssa.co.za/login.php">';
    }
 ?>