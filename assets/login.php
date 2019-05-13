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

        // getting data according to login credentials
        $sql = "SELECT * FROM `users` WHERE `emailAddress`='$userEmail'";
        $queryForUserData = $conn->query($sql);
        $userData = $queryForUserData->fetch_assoc();

        if($queryForUserData->num_rows >= 1 && password_verify($userPass, $userData['userPassword'])){
            $_SESSION["user"] = $userData;
            echo 'login';
        }else{
            echo 'not-login';
            die;
        }
    }