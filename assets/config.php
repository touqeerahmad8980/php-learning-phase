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
            $createTable = "CREATE TABLE tasks_reminder(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                task_name VARCHAR(30),
                task_description VARCHAR(30),
                due_date VARCHAR(30),
                add_favourite BOOLEAN,
                reg_date TIMESTAMP
            )";
        }

        
    }
