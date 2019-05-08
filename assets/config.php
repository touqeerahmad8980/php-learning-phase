<?php
    $serverName = 'localhost';
    $userName = 'root';
    $userPassword = '';
    $dbName = "task_reminder";

    $conn = new mysqli($serverName, $userName, $userPassword, $dbName);

    if($conn->connect_error){
        echo 'connection failed';
        die;
    }