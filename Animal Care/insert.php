<?php

    $conn = mysqli_connect("localhost", "root", "", "test1");

    // Check connection

    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Escape user inputs for security
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pswd = mysqli_real_escape_string($conn, $_POST['pswd']);
    $pswd2 = mysqli_real_escape_string($conn, $_POST['pswd2']);

    // attempt insert query execution
    $sql = "INSERT INTO signup (username, email, pass,cpass) VALUES ('$uname', '$email', '$pswd','$pswd2')";

    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
        header('Location: firstpage.html');
    } else{
        echo "ERROR: Could not able to execute. " ;
    }

    // close connection
    mysqli_close($conn);
?>