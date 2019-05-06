<?php

    require('config.php');

    $getTask = "SELECT * FROM tasks_reminder WHERE add_favourite=1";
    // SELECT column-list|* FROM table-name ORDER BY ASC | DESC;

    $result = $conn->query($getTask);