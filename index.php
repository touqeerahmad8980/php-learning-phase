<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Reminder</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
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
    <section class="add_page">
        <div class="container">
            <h3 class="heading text-center mb-5">Task Reminder</h3>
                <div class="form-group">
                    <label for="title">Task Title:</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="desc">Task Description:</label>
                    <input type="text" class="form-control" name="desc" id="desc">
                </div>
                <div class="form-group">
                    <label for="desc">Day for Task:</label>
                    <input type="date" class="form-control" data-date="" data-date-format="DD MMMM YY" value="15-08-09" id="datepicker" name="date" />
                </div>
                <a id="addtask" class="btn btn-primary">Submit</a>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        $('#addtask').click(function(){
            title = $('#title').val();
            desc = $('#desc').val();
            date = $('#datepicker').val();
            $.ajax({
                type: "POST",
                url: "assets/create-task.php",
                dataType: 'text',
                data: { title , desc , date},
                success: function(data){
                  if(data === 'already exists'){
                      alert('sorry record already exists')
                  }else if(data === 'not exists'){
                    alert('record added.');
                    location.href = "./tasks-list.php";                  
                  }
                }
            });
        });
    </script>
</body>
</html>