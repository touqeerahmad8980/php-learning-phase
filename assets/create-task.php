<?php
require('config.php');

$description = $dueDate = $title = null;
$title =  $_POST['title'];
$description  = $_POST['desc'];
$dueDate  = $_POST['date'];

if (isset($_POST)) {
    $task_already_exist = " SELECT * FROM `tasks_reminder` WHERE `task_name`='$title' ";
    $result = $conn->query($task_already_exist);
    if ($result->num_rows > 0) { 
        echo "already exist";die;
    } else {
        $createTask = "INSERT INTO tasks_reminder(task_name, task_description , due_date , add_favourite)
        VALUES ('$title', '$description', '$dueDate', false)";
        $conn->query($createTask);
        header('location: http://localhost/php-learning/tasks-list.php');
    };
}
