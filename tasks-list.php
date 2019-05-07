<?php  
    require('assets/get-task.php');
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
            </ul>
        </div>

    </nav>
    <div class="container">
        <h3 class="text-center" style="margin-bottom:40px;">Tasks List </h3>
        <div class="row">
            <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    $now = date("Y-m-d");
                    while($row = $result->fetch_assoc()) { ?>
                        <?php if($row["add_favourite"] === '0'){ ?>
                            <div class='col-sm-6' id="<?php echo $row["id"]?>"  style='margin-bottom:30px;'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='card-title'><?php echo $row["task_name"]?></h4>
                                        <p class='card-text'><?php echo $row["task_description"] ?></p>
                                        <?php if($row["due_date"] < $now) { ?>
                                            <span class="text-danger status">Expire</span>
                                        <?php  }else{ ?>
                                            <span class="text-success status">Active</span>
                                        <?php  }?>
                                        <button class='btn btn-primary' onclick='removeTask(<?php echo $row["id"].",this" ?>)'>Remove Task</button>
                                        <button class='btn btn-primary float-right' onclick='addFav(<?php echo $row["id"].",this" ?>)'>Move Favourite</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php  }
                }
            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function addFav(id , this_scope) {
        $.ajax({
            type: "POST",
            url: "assets/add-favourite.php",
            dataType: 'JSON',
            data: { id: id, set : true }
        });
        $(this_scope).parents('.col-sm-6').remove();
        checkEmptyList(); 
    }

    function removeTask(id , this_scope) {
        $.ajax({
            type: "POST",
            url: "assets/remove-task.php",
            dataType: 'JSON',
            data: { id: id }
        });
        $(this_scope).parents('.col-sm-6').remove();
        checkEmptyList();  
    }

    function checkEmptyList(){
        taskCount = $('.row .col-sm-6').length;
        if(taskCount <= 0){
            $('.row').append('<p>Sorry record not found.</p>')
        }
    }

    $(document).ready(function(){
        checkEmptyList();  
    });
   </script>
</body>
</html>