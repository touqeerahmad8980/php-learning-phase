<?php

    require('config.php');

    $getTask = "SELECT * FROM tasks_reminder ORDER BY create_date DESC";
    // SELECT column-list|* FROM table-name ORDER BY ASC | DESC;

    $result = $conn->query($getTask);