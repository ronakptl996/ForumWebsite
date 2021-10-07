<?php
    
    $showError = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'dbconn.php';
        $user_email = $_POST['signupEmail'];
        $pass = $_POST['signpassword'];
        $cpass = $_POST['signcpassword'];

        $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows>0){
            $showError = "Email is Already Use";
        }
        else{
            if($pass == $cpass){
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = true;
                    header("Location: /Forum Website/index.php?signupsuccess=true");
                    exit();
                }
            }
            else{
                $showError = "Password not Match";
            }
        }
        header("Location: /Forum Website/index.php?signupsuccess=false&error=$showError");
    }

?>