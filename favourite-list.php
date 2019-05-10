<?php  
    require('assets/favourite-task.php');
    session_start();
    if(!isset($_SESSION["loggin"])){
        header('location: ./login.php');
    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">    
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-light">

        <div class="container">

            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./">ADD Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./tasks-list.php">Task List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./favourite-list.php">Favourite</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./expire-task.php">Expire Task</a>                   
                </li>
                <li class="nav-item">
                    <a id="logout" class="nav-link" href="javascript:void(0)">Logout</a>
                </li>
            </ul>
            <P class="username">Hello, <?php echo $_SESSION['username']?></p>
        </div>

    </nav>
    <div class="container">
        <h3 class="text-center" style="margin-bottom:40px;">Favourite List </h3>
        <div class="row">
            <?php echo $_SESSION["userid"]?>
            <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <div class='col-sm-6' style='margin-bottom:30px;'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h4 class='card-title'>".$row["task_name"]."</h4>
                                    <p class='card-text'>".$row["task_description"]."</p>";
                                    $now = date("Y-m-d");
                                    if($row["due_date"] < $now) {
                                        echo '<span class="text-danger status">Expire</span>';
                                    }else{
                                        echo '<span class="text-success status">Active</span>';
                                    };
                                    echo "<button class='btn btn-primary' onclick='removeTask(".$row["id"].",this)'>Remove Task</button>
                                    <button type='submit' class='btn btn-primary' onclick='removeFav(".$row["id"].",this)'>Remove Favourite</button>
                                </div>
                            </div>
                        </div>
                    ";
                    }
                }
            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function removeTask(id, this_scope) {
        $.ajax({
            type: "POST",
            url: "assets/remove-task.php",
            dataType: 'JSON',
            data: { id: id }
        });
        $(this_scope).parents('.col-sm-6').remove();
        checkEmptyList();
    }
    function removeFav(id , this_scope) {
        $.ajax({
            type: "POST",
            url: "assets/add-favourite.php",
            dataType: 'JSON',
            data: { id: id, set : false }
        });
        $(this_scope).parents('.col-sm-6').remove();
        checkEmptyList();
    }
    function checkEmptyList(){
        taskCount = $('.row .col-sm-6').length;
        if(taskCount <= 0){
            $('.row').append('<p>Sorry favourite tasks record not found.</p>')
        }
    }
    $(document).ready(function(){
        checkEmptyList();  
    });
   </script>
</body>
</html>