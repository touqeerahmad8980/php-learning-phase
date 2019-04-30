<?php

    require('config.php');

    $getTask = "SELECT * FROM tasks_reminder";
    $result = $conn->query($getTask);