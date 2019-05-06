<?php 
    require('config.php');
    
    if($_POST['set'] === 'true' ){
        $id = $_POST['id'];
        $addFavorute = "UPDATE tasks_reminder SET add_favourite=1 WHERE id='$id'";
        $conn->query($addFavorute);
        var_dump($addFavorute);
    };

    if($_POST['set'] === 'false' ){
        $id = $_POST['id'];
        $addFavorute = "UPDATE tasks_reminder SET add_favourite=0 WHERE id='$id'";
        $conn->query($addFavorute);
        var_dump($addFavorute);
    };