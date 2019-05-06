<?php
    $serverName = 'localhost';
    $userName = 'root';
    $userPassword = '';
    $dbName = "task_reminder";

    $conn = new mysqli($serverName, $userName, $userPassword, $dbName);

    if($conn->connect_error){
        echo 'connection failed';
        alert('connection failed');
        die;
    }else{
        $check_table = 'DESCRIBE `tasks_reminder`';
        if(!$conn->query($check_table)){
            echo "table not found";
            die;
        }

        
    }
