<?php
    session_start();
    if(!$_SESSION['username'])  
    {  
  
        header("Location: login.php");//redirect to login page to secure the todo page without login access.  
    } 
    // require('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To Do List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="header">
            <div>
                <!-- <i class="fa fa-refresh"></i> -->
                <!-- <form action="logout.php"> -->

            <a href="logout.php" class="btn" role="button" style="background-color: white; color: black; height: 50px; width: 100px; font-size: 25px; float: right; margin: 15px;">Logout</a>
            <p style="color:white; float: right; margin: 15px; font-size: 30px;">Hi!&nbsp<?php echo $_SESSION['username'];  ?></p>
            </div>
            <div id="date"></div>
        </div>

        <div class="content">
            <ul id="list">
               <!-- 
                <li class="item">
                    <i class="fa fa-circle-thin co" job="complete" id="0"></i>
                    <p class="text">Drink Coffee</p>
                    <i class="fa fa-trash-o de" job="delete" id="0"></i> 
                </li> -->
            </ul>
        </div>

        <div class="add-to-do">
            <i class="fa fa-plus-circle"></i>
            <input type="text" id="input" placeholder="Add a to-do">
        </div>
        
    </div>
    <script src="js/app.js"></script>
</body>
</html>