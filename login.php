<?php 
    session_start();

    if(isset($_SESSION["user"])){
        header('location: ./index.php');
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
    <noscript>
        <div class="container">
            For full functionality of this site it is necessary to enable JavaScript.
            Here are the <a href="https://www.enable-javascript.com/">
            instructions how to enable JavaScript in your web browser</a>.
        </div>
    </noscript>
</head>

<body>
    <!-- A grey horizontal navbar that becomes vertical on small screens -->
    <nav class="navbar navbar-expand-sm bg-light">

<div class="container">

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="./login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./signup.php">Signup</a>
        </li>
    </ul>
</div>

</nav>
    <section class="add_page">
        <div class="container">
            <div id='success' class="toast">
                <div class="toast-header"><strong class="mr-auto text-success">Congratulation:</strong></div>
                <div class="toast-body">Login Successfully.</div>
            </div>
            <div id='failed' class="toast">
                <div class="toast-header"><strong class="mr-auto text-danger">Login Failed:</strong></div>
                <div class="toast-body">Please enter correct email or password.</div>
            </div>
            <h3 class="heading text-center mb-5">Login</h3>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="userEmail"  autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="userPass" autocomplete="off" required/>
            </div>
            <a id="login" href="javascript:void(0)" class="btn btn-primary">login</a>
        </div>
    </section>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        // all field validation checking
        $('#userName , #userEmail, #userPass').keyup(function(){
            value = $(this).val();
            this_scope = $(this);
            checkValidation(value , this_scope);
        });

        // submit data
        $('#login').click(function() {

            // get all value
            userEmail = $('#userEmail').val();
            userPass = $('#userPass').val();

            // check all validation again
            checkValidation(userEmail , $('#userEmail'));
            checkValidation(userPass , $('#userPass'));

            errorCount = $('.form-group span.text-danger').length;

            if(errorCount < 1){
                $.ajax({
                    type : "POST",
                    url: "assets/login.php",
                    dataType: "text",
                    data: {  userEmail, userPass},
                    success: function(data){
                        if(data == 'login'){
                            $('#success').toast({delay: 1000});
                            $('#success').toast('show');
                            setTimeout(() => {
                                location.href = "./tasks-list.php";
                            }, 1000);
                        }else{
                            $('#failed').toast({delay: 1000});
                            $('#failed').toast('show');
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>