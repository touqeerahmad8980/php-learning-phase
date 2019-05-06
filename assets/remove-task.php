<?php
require('config.php');

if ($_POST['id']) {
    $id = $_POST['id'];
    $addFavorute = "DELETE FROM tasks_reminder WHERE id='$id'";
    $res=$conn->query($addFavorute);

    if ($res) {
        echo 1;die;
    }
    else{
        echo 0;die;
    }
};

// $getTask = "SELECT * FROM tasks_reminder ORDER BY create_date DESC";
// // SELECT column-list|* FROM table-name ORDER BY ASC | DESC;

// $result = $conn->query($getTask);
