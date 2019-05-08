<?php 
    require('config.php');
    
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPass =$_POST['userPass'];

    $pattern = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';

    if(empty($userName) || empty($userEmail) || empty($userPass) || !preg_match($pattern, $userEmail) || strlen($userPass) < 6){
        echo 'Data is Empty or not valid.';
        die;
    }else{
        $userPass = password_hash($_POST['userPass'], PASSWORD_DEFAULT);
        $signup = "INSERT INTO users(UserName, emailAddress, userPassword)
        VALUES('$userName', '$userEmail', '$userPass') ";
    
        $signupSuccess = $conn->query($signup);
    
        if($signupSuccess === true){
            echo 'success';
        }else{
            echo 'error';
        }
    }

