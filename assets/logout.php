<?php 
    session_start();

    if($_POST['loggout'] == 'true'){
        session_unset();
        echo 'logout';
    }