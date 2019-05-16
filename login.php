<?php  
	//Start the Session
	session_start();
?>	

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web">
    <!-- <link rel="stylesheet" href="css/font-awesome.css"> -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container box">

	<h2 style="text-align: center;">LOGIN</h2>
	<form role="form" "action="login.php" method="POST">
    	<!-- <div class="form-group">
      		<label for="email">Email:</label>
      		<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
    	</div> -->

    	<div class="form-group">
 			 <label for="username">Username:</label>
 			 <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required pattern="^[a-z0-9_-]{3,15}$" title="Must contain atleast 3 characters">
		</div>

    	<div class="form-group">
      		<label for="password">Password:</label>
      		<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required pattern="^[a-z0-9_-]{6,15}$" title="Must contain atleast 6 characters">
   	    </div>

   	    <a href="signin.php" class="anchor"><b>Create an account</b></a>
   	    <br>
    	<button name="login" type="submit" class="btn btn-default btn-lg" style="background-color: #4162f6; color: white;">Login</button>
	</form>
</div>

</body>
</html>

<?php 
    require('connect.php');
	if(isset($_POST['login'])){
			$username = mysqli_real_escape_string($connection,$_POST['username']);
			// $password = md5($_POST['password']);
			$password = $_POST['password'];
			$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";  
			$result = mysqli_query($connection, $query);
			$count = mysqli_num_rows($result);
			echo "<script>console.log($count);</script>";

			if (mysqli_num_rows($result)){
				echo "<script>window.open('index.php','_self')</script>"; 
				$_SESSION['username'] = $username; //session is used
			}
			else{
				echo "<script>alert('Invalid Login Credentials!')</script>";
				echo "<script>window.open('login.php','_self')</script>"; 

			}
	}
?>

