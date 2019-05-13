// remove task function
function removeTask(id, this_scope) {
    $.ajax({
        type: "POST",
        url: "assets/remove-task.php",
        dataType: 'text',
        data: { id: id },
        success: function(data){
            if(data == 'deleted'){
                $(this_scope).parents('.col-sm-6').remove();
                checkEmptyList();
            }
        }
    });
}

// no recird found function
function checkEmptyList(){
    taskCount = $('.row .col-sm-6').length;
    if(taskCount <= 0){
        $('.row').append('<p>Sorry record not found.</p>')
    }
}

// logout function
$('#logout').click(function(){
    $.ajax({
        type: 'POST',
        url: 'assets/logout.php',
        data: { loggout:true},
        dataType: 'text',
        success: function(data) {
            console.log('loggout suxcess'+data)
            if(data == 'logout'){
            location.href = "./login.php";
            }
        }
    })
});

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