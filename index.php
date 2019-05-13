<?php 
    session_start();
    if(!isset($_SESSION["user"])){
        header('location: ./login.php');
    }
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
                <li class="nav-item">
                    <a id="logout" class="nav-link" href="javascript:void(0)">Logout</a>
                </li>
            </ul>
            <P class="username">Hello, <?php echo $_SESSION['user']['userName']?></p>
        </div>

    </nav>
    <section class="add_page">
        <div class="container">
            <div id='success' class="toast">
                <div class="toast-header"><strong class="mr-auto text-success">Congratulation:</strong></div>
                <div class="toast-body">record added.</div>
            </div>
            <div id='faild' class="toast">
                <div class="toast-header"><strong class="mr-auto text-danger">Sorry:</strong></div>
                <div class="toast-body">Task Already exist.</div>
            </div>
            <h3 class="heading text-center mb-5">Task Reminder</h3>
            <div class="form-group">
                <label for="title">Task Title:</label>
                <input type="text" class="form-control" name="title" id="title" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="desc">Task Description:</label>
                <input type="text" class="form-control" name="desc" id="desc"  autocomplete="off">
            </div>
            <div class="form-group">
                <label for="desc">Day for Task:</label>
                <input type="date" class="form-control" data-date="" data-date-format="DD MMMM YY" min=<?php echo date('Y-m-d'); ?> id="datepicker" name="date" />
            </div>
            <a id="addtask" href="javascript:void(0)" class="btn btn-primary">Submit</a>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $('#title , #desc ').keyup(function(){
            value = $(this).val();
            this_scope = $(this);
            checkValidation(value , this_scope);
        });
        
        $('#datepicker').change(function(){
            value = $(this).val();
            this_scope = $(this);
            checkValidation(value , this_scope);
        });
        
        $('#addtask').click(function() {
            title = $('#title').val();
            desc = $('#desc').val();
            date = $('#datepicker').val();
            checkValidation(title , $('#title'));
            checkValidation(desc , $('#desc'));
            checkValidation(date , $('#datepicker'));
            errorCount = $('.form-group span.text-danger').length;

            if(errorCount < 1){
                $.ajax({
                    type: "POST",
                    url: "assets/create-task.php",
                    dataType: 'text',
                    data: {
                        title,
                        desc,
                        date
                    },
                    success: function(data) {
                        if (data === 'already exists') {
                            $('#faild').toast({delay: 1000});
                            $('#faild').toast('show');
                        } else if (data === 'not exists') {
                            $('#success').toast({delay: 1000});
                            $('#success').toast('show');
                            setTimeout(() => {
                                location.href = "./tasks-list.php";
                            }, 1000);
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>