<?php
  require('connect.php'); //make connection here
    // If the values are posted, insert them into the database.
    if (isset($_POST['submit']))
    // {
    //   echo "<script type='text/javascript'>alert('submit');</script>";
    // }
    {
      if (isset($_POST['username']) && isset($_POST['password'])){
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        // $password = md5($_POST['password']);
        $password = $_POST['password'];
        $check_username_query = "SELECT * FROM users WHERE username='$username'";
        $run_query=mysqli_query($connection,$check_username_query);  
  
        if(mysqli_num_rows($run_query)>0)  
        {  
          echo "<script>alert('Username $username already exist in our database, Please try another one!')</script>";  
          echo"<script>window.open('signin.php','_self')</script>";
          exit();  
        }  

        // ob_start();
        $query = "INSERT INTO `users` (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($connection, $query);
        if($result)
        {
          echo"<script>window.open('todo.php','_self')</script>";
        }
        else
        {
          echo(" Error description: " . mysqli_error($connection));;
        }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>SIGN IN</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
    <!-- <link rel="stylesheet" href="css/font-awesome.css"> -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container box">
	<h2 style="text-align: center;">SIGN IN</h2>
	<form role="form" method="POST" action="signin.php">
    	<div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username"  id="username" class="form-control" placeholder="Enter username"  required pattern="^[a-z0-9_-]{3,15}$" title="Must contain atleast 3 characters" >
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password"  id="password" class="form-control" placeholder="Enter password"  required pattern="^[a-z0-9_-]{6,15}$" title="Must contain atleast 6 characters">
      </div>

   	    <a href="login.php" class="anchor"><b>Login</b></a>
   	    <br>
    	<button type="submit" name="submit" class="btn btn-default btn-lg" style="background-color: #4162f6; color: white;">Sign In</button>
	</form>
</div>

</body>

</html>