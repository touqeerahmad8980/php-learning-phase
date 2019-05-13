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
                <div class="toast-body">Register Successfully</div>
            </div>
            <h3 class="heading text-center mb-5">Signup</h3>
            <div class="form-group">
                <label for="userName">User Name:</label>
                <input type="text" class="form-control" name="userName" id="userName" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="userEmail"  autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="userPass" autocomplete="off" required/>
            </div>
            <div class="form-group">
                <label for="confirmPass">Confirm Password:</label>
                <input type="password" class="form-control" name="confirmPass" id="confirmPass" />
            </div>
            <a id="signup" href="javascript:void(0)" class="btn btn-primary">Signup</a>
        </div>
    </section>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>

        // custom validation function here
        function checkValidation(value , this_scope){
            checkType = this_scope.attr("type");

            if(checkType === "email"){
                emailTest = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                if(value === ''){
                    this_scope.next("span.text-danger").remove();
                    this_scope.parents('.form-group').append('<span class="text-danger">This field is requied.</span>');
                }
                else if(!emailTest.test(value)){
                    this_scope.next("span.text-danger").remove();
                    this_scope.parents('.form-group').append('<span class="text-danger">Please Enter Valid Email address.</span>');
                }
                else{
                    this_scope.next("span.text-danger").remove();
                }
            }
            else if(checkType === "password"){
                if(value === ''){
                    this_scope.next("span.text-danger").remove();
                    this_scope.parents('.form-group').append('<span class="text-danger">This field is requied.</span>');
                }else if(value.length < 6){
                    this_scope.next("span.text-danger").remove();
                    this_scope.parents('.form-group').append('<span class="text-danger">Please Enter Minimum 6 characters.</span>');
                }else{
                    this_scope.next("span.text-danger").remove();
                }
            }
            else{
                if(value === ''){
                    this_scope.next("span.text-danger").remove();
                    this_scope.parents('.form-group').append('<span class="text-danger">This field is requied.</span>');
                }else{
                    this_scope.next("span.text-danger").remove();
                }
            }
        }

        // all field validation checking
        $('#userName , #userEmail, #userPass').keyup(function(){
            value = $(this).val();
            this_scope = $(this);
            checkValidation(value , this_scope);
        });

        // password match checking
        $('#confirmPass').keyup(function(){
            password = $('#userPass').val();
            confirmPass = $(this).val();
            if(password != confirmPass){
                $(this).next("span.text-danger").remove();
                $(this).parents('.form-group').append('<span class="text-danger">Both Password not match.</span>');
            }else{
                $(this).next("span.text-danger").remove();
            }
        });

        // submit data
        $('#signup').click(function() {

            // get all value
            userName = $('#userName').val();
            userEmail = $('#userEmail').val();
            userPass = $('#userPass').val();
            confirmPass = $('#confirmPass').val();

            // check all validation again
            checkValidation(userName , $('#userName'));
            checkValidation(userEmail , $('#userEmail'));
            checkValidation(userPass , $('#userPass'));
            checkValidation(confirmPass , $('#confirmPass'));

            errorCount = $('.form-group span.text-danger').length;

            if(errorCount < 1){
                $.ajax({
                    type : "POST",
                    url: "assets/signup.php",
                    dataType: "text",
                    data: { userName , userEmail, userPass},
                    success: function(data){
                        if(data == 'success'){
                            $('#success').toast({delay: 1000});
                            $('#success').toast('show');
                            setTimeout(() => {
                                location.href = "./login.php";
                            }, 1000);
                        }else{
                            alert(data);
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>