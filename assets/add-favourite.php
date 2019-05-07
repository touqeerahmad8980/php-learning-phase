<?php 
    require('config.php');
    
    $id = $_POST['id'];
    
    if($_POST['set'] === 'true' ){
        $addFavorute = "UPDATE tasks_reminder SET add_favourite=1 WHERE id='$id'";
        $conn->query($addFavorute);
    }else if($_POST['set'] === 'false' ){
        $removeFavorute = "UPDATE tasks_reminder SET add_favourite=0 WHERE id='$id'";
        $conn->query($removeFavorute);
    };