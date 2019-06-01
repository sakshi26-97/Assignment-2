<?php
    session_start();
    if(!$_SESSION['username'])  
    {  
  
        header("Location: login.php");//redirect to login page to secure the todo page without login access.  
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>TO-DO List</title>
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

  <nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#" style="color: white; font-size: 22px;">TO DO List</a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li id="date"></li>
        <li class="nav-item"><a href="#">Hi!&nbsp<?php echo $_SESSION['username'];  ?></a></li>
        <li class="nav-item"><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>
  
  <div class="container-fluid">

   <div class="content">
            <ul id="list">
              
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