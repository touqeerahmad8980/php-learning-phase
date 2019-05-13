<?php  
    require('assets/get-task.php');

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
            <P class="username">Hello, <?php echo $_SESSION['user']['userName']?></p>
        </div>

    </nav>
    <div class="container">
        <h3 class="text-center" style="margin-bottom:40px;">Tasks List </h3>
        <div class="row">
            <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    
                    while($row = $result->fetch_assoc()) { ?>
                        <?php if($row["add_favourite"] === '0'){ ?>
                            <div class='col-sm-6' id="<?php echo $row["id"]?>"  style='margin-bottom:30px;'>
                                <?php
                                    date_default_timezone_set("Asia/Karachi");
                                    $now = date("Y-m-d H:i:s");
                                    $create_date = date ($row['create_date']);
                                    $current = strtotime(date ('Y-m-d H:i:s'));  
                                    $created = strtotime($create_date);  
                                    $diff = abs($created - $current);  
                                    $years = floor($diff / (365*60*60*24));  
                                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));  
                                    $days = floor(($diff - $years * 365*60*60*24 -  $months*30*60*60*24)/ (60*60*24)); 
                                    $hours = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24) / (60*60));  
                                    $minutes = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24  - $hours*60*60)/ 60);  
                                    $seconds = floor(($diff - $years * 365*60*60*24  - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                                ?>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h4 class='card-title'><?php echo $row["task_name"]?></h4>
                                        <p class='card-text'><?php echo $row["task_description"] ?></p>
                                        <strong class="date">
                                            <span class="hour"><?php echo  $hours?></span> hour
                                            <span class="min"><?php echo  $minutes?></span> min
                                            <span class="sec"><?php echo  $seconds?></span> sec
                                        </strong>
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
    <script src="js/script.js"></script>
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

    $(document).ready(function(){
        checkEmptyList();

        $('.row .col-sm-6').each(function(){
            setInterval(() => {
                hour=parseInt($(this).find('.hour').text());
                min=parseInt($(this).find('.min').text());
                sec=parseInt($(this).find('.sec').text());
                sec=sec+1;
                if(sec>=60){
                    sec=0;
                    min=min+1;
                    if(min>=60){
                        min=0;
                        hour=hour+1;
                    }
                }
                // if(hour>=1){
                //     id = $(this).attr('id');
                //     addFav(id , $(this));
                //     $(this).remove();
                // }

                $(this).find('.hour').text(hour);
                $(this).find('.min').text(min);
                $(this).find('.sec').text(sec);
            }, 1000);
        })
    });
    
   </script>
</body>
</html>