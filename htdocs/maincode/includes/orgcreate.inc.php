<?php

session_start();

if(isset($_POST['submit'])) {
    include_once 'dbh.inc.php';
    
    $name     = mysqli_real_escape_string($conn, $_POST['org_name']);
    $address  = mysqli_real_escape_string($conn, $_POST['org_address']);
    $owner    = mysqli_real_escape_string($conn, $_POST['org_owner']);
    
    $sql = "SELECT * FROM organizations WHERE org_name = '$name'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    

    if($resultCheck > 0){
        header("Location: ../orgcreate.php?orgcreate=orgnamealreadytaken");
        exit();
    }else{
        //Hashing the password to make it unrecognizable
        //$hashedpwd = password_hash($pass, PASSWORD_DEFAULT);
        //Insert the user into the database
        $sql = "INSERT INTO organizations (org_name, address, owner_id, owner_name) VALUES ('$name', '$address', '".$_SESSION['u_id']."', '$owner');";

        mysqli_query($conn, $sql);
        header("Location: ../home.php?orgcreate=success");
        exit();
    }
}else{
    header("Location: ../orgcreate.php");
    exit();
}
