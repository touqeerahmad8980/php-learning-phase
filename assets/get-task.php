<?php

    require('config.php');
    
    if(isset($_SESSION["userid"])){
        $userId =  $_SESSION["userid"];
        $getTask = "SELECT * FROM tasks_reminder WHERE userID='$userId' ORDER BY create_date DESC";
        $result = $conn->query($getTask);
    }