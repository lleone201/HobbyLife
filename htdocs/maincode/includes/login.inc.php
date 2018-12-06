<?php

//echo "Hello";
session_start();

if(isset($_POST['submit'])){
    //echo "Hello";
    include_once 'dbh.inc.php';
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_pass = '$pass'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1){
        //If we have no results
        header("Location: ../index.php?login=error");
        exit();
    }else{
                //Log in the user
        $row = mysqli_fetch_assoc($result);
        $_SESSION['u_id']       = $row['user_id'];
        $_SESSION['u_first']    = $row['user_first'];
        $_SESSION['u_last']     = $row['user_last'];
        $_SESSION['u_email']    = $row['user_email'];
        $_SESSION['u_username'] = $row['username'];
        header("Location: ../home.php?login=success");
        exit();
    }
}

