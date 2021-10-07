<?php

    $showError = "false";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include 'dbconn.php';
        $email = $_POST['loginEmail'];
        $password = $_POST['loginPassword'];

        $sql = "SELECT * FROM `users` where user_email='$email'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if($numRows==1){
            $row = mysqli_fetch_assoc($result);
                if(password_verify($password, $row['user_pass'])){
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['sno']=$row['sno.'];
                    $_SESSION['user_email']=$email;
                }
                    header("Location: /Forum Website/index.php");
        }
        header("Location: /Forum Website/index.php");
    }

?>