<?php
    require('config.php');
    session_start();

    $userEmail = $_POST['userEmail'];
    $userPass =$_POST['userPass'];

    $pattern = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';

    if(empty($userEmail) || empty($userPass) || !preg_match($pattern, $userEmail) || strlen($userPass) < 6){
        echo 'Data is Empty or not valid.';
        die;
    }else{
        $checkingEmail = "SELECT * FROM `users` WHERE `emailAddress`='$userEmail'";
        $fetchPassword = "SELECT `userPassword` FROM `users` WHERE `emailAddress`='$userEmail'";
        $fetchUserName = "SELECT `userName` FROM `users` WHERE `emailAddress`='$userEmail'";
        $email = $conn->query($checkingEmail);
        $userName = $conn->query($fetchUserName)->fetch_assoc();
        $row = $conn->query($fetchPassword)->fetch_assoc();

        if($email->num_rows >= 1 && password_verify($userPass, $row['userPassword'])){
            echo 'login';
            $_SESSION["username"] = $userName['userName'];
            $_SESSION["email"] = "$userEmail";
            $_SESSION["loggin"] = true;
        }else{
            echo 'not-login';
            $_SESSION["loggin"] = false;
            die;
        }
    }