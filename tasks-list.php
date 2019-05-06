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
    <style>
    .status{position: absolute;top: 10px;right: 15px;font-weight: bold;}
    </style>
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
                <a class="nav-link" href="./favourite-list.php">Favourite</a>                   
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./tasks-list.php">Task List</a>
                   
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
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <div class='col-sm-6' id=".$row["id"]."  style='margin-bottom:30px;'>
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
                                    echo "<button class='btn btn-primary' onclick='removeTask(".$row["id"].")'>Remove Task</button>";
                                    if($row["add_favourite"] === '0'){
                                        echo "<button class='btn btn-primary float-right' onclick='addFav(".$row["id"].")'>Add Favourite</button>";
                                    }
                                echo "</div>
                            </div>
                        </div>
                    ";
                    }
                } else {
                    echo "0 results";
                }
            ?>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
    function addFav(id) {
        $.ajax({
        type: "POST",
        url: "assets/add-favourite.php",
        dataType: 'JSON',
        data: { id: id, set : true }
        });
    }
    function removeTask(id) {
        var $t = $(this);
        $.ajax({
        type: "POST",
        url: "assets/remove-task.php",
        dataType: 'JSON',
        context: this,
        data: { id: id },
        success: (data) => {
            if(data == 1 ){
                $(this).hide();
                $(this).addClass('text-danger');
                console.log('true')
            }else{
                console.log('false');
            }
         }
        })
    }
   </script>
</body>
</html>