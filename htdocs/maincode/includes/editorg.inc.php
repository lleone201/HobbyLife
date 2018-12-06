<?php

if(isset($_POST['submit'])) {
    include_once 'dbh.inc.php';
    
    $org_name = mysqli_real_escape_string($conn, $_POST['org_name']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    
    $idget    = mysqli_real_escape_string($conn, $_GET['org_id']);
    echo $org_name;
    echo $address;
    echo $idget;
        $sql = "UPDATE organizations
                SET org_name = '$org_name', address = '$address'
                WHERE org_id = '$idget'";
        //echo $GET['org_id'];
        mysqli_query($conn, $sql);
        header("Location: ../orgpage.php?signup=success&org_id=$idget");
        exit();
    
}else{
    header("Location: ../editorg.php");
    exit();
}
