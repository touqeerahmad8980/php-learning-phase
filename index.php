<?php 
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
            <P class="username">Hello, <?php echo $_SESSION['username']?></p>
        </div>

    </nav>
    <section class="add_page">
        <div class="container">
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
    <script>
        function requireInput(value , this_scope){
            if(value === ''){
                this_scope.next("span.text-danger").remove();
                this_scope.parents('.form-group').append('<span class="text-danger">This field is requied.</span>');
            }else{
                this_scope.next("span.text-danger").remove();
            }
        }

        $('#title , #desc ').keyup(function(){
            value = $(this).val();
            this_scope = $(this);
            requireInput(value , this_scope);
        });
        
        $('#datepicker').change(function(){
            value = $(this).val();
            this_scope = $(this);
            requireInput(value , this_scope);
        });
        
        $('#addtask').click(function() {
            title = $('#title').val();
            desc = $('#desc').val();
            date = $('#datepicker').val();
            requireInput(title , $('#title'));
            requireInput(desc , $('#desc'));
            requireInput(date , $('#datepicker'));
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
                            alert('sorry record already exists')
                        } else if (data === 'not exists') {
                            alert('record added.');
                            location.href = "./tasks-list.php";
                        }
                    }
                });
            }
        });

        $('#logout').click(function(){
            $.ajax({
                type: 'POST',
                url: 'assets/logout.php',
                data: { loggout:'true'},
                dataType: 'text',
                success: function(data) {
                   console.log('loggout suxcess'+data)
                   if(data == 'logout'){
                    location.href = "./login.php";
                   }
                }
            })
        });
    </script>
</body>

</html>