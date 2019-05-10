<?php
require('config.php');
session_start();

$description = $dueDate = $title = null;
$title =  $_POST['title'];
$description  = $_POST['desc'];
$dueDate  = $_POST['date'];
$userId = $_SESSION["userid"];

if (isset($_POST)) {
    $task_already_exist = " SELECT * FROM `tasks_reminder` WHERE `task_name`='$title' ";
    $result = $conn->query($task_already_exist);
    if ($result->num_rows > 0) {
        echo 'already exists';die;
    } else {
        $createTask = "INSERT INTO tasks_reminder(userID, task_name, task_description , due_date , add_favourite)
        VALUES ('$userId', '$title', '$description', '$dueDate', false)";
        $conn->query($createTask);
        echo 'not exists';die;
    };
}