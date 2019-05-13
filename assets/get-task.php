<?php
    require('config.php');
    session_start();

    if(isset($_SESSION['user'])){
        $userId=$_SESSION['user']['userID'];
        $getTask = "SELECT * FROM tasks_reminder WHERE userID='$userId' ORDER BY create_date DESC";
        $result = $conn->query($getTask);
    }
