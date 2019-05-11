<?php
    require('config.php');
    session_start();

    if(isset($_SESSION['userId'])){
        $userId=$_SESSION['userId'];
        $getTask = "SELECT * FROM tasks_reminder WHERE userID='$userId' ORDER BY create_date DESC";
        $result = $conn->query($getTask);
    }
    // SELECT column-list|* FROM table-name ORDER BY ASC | DESC;
