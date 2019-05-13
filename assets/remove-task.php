<?php
require('config.php');

if ($_POST['id']) {
    $id = $_POST['id'];
    $addFavorute = "DELETE FROM tasks_reminder WHERE id='$id'";
    $res=$conn->query($addFavorute);

    if ($res) {
        echo 'deleted';
    }
};