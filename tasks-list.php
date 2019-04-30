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
</head>
<body>
    <div class="container">
        <h3 class="text-center">Tasks List </h3>
        <div class="row">
            <?php
                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <div class='col-sm-4>
                            <div class='card' style='width:400px'>
                                <div class='card-body'>
                                    <h4 class='card-title'>John Doe</h4>
                                    <p class='card-text'>Some example text some example text. John Doe is an architect and engineer</p>
                                    <a href='#' class='btn btn-primary'>See Profile</a>
                                </div>
                            </div>
                        </div>
                    ";
                        // echo "id: " . $row["id"]. " - Name: " . $row["task_name"]. " " . $row["task_description"]. "date". $row["due_date"]. "<br>";
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
</body>
</html>