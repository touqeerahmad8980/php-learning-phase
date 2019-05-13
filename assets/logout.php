<?php 
    session_start();

    if(isset($_POST['loggout'])){
        session_unset();
        echo 'logout';
    }