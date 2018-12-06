<?php

if(isset($_POST['submit'])) {
    include_once 'dbh.inc.php';
    
    $first = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last  = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    

    if($resultCheck > 0){
        header("Location: ../signup.php?signup=useralreadytaken");
        exit();
    }else{
        //Hashing the password to make it unrecognizable
        //$hashedpwd = password_hash($pass, PASSWORD_DEFAULT);
        //Insert the user into the database
        $sql = "INSERT INTO users (user_first, user_last, user_email, username, user_pass) VALUES ('$first', '$last', '$email', '$username', '$pass');";

        mysqli_query($conn, $sql);
        header("Location: ../signup.php?signup=success");
        exit();
    }
}else{
    header("Location: ../signup.php");
    exit();
}
