<?php  
	//Start the Session
	session_start();
	 require('connect.php');
	//3. If the form is submitted or not.
	//3.1 If the form is submitted

	if (isset($_POST['username']) and isset($_POST['password'])){
	//3.1.1 Assigning posted values to variables.
		$username = mysqli_real_escape_string($connection,$_POST['username']);
		$password = md5($_POST['password']);
	//3.1.2 Checking the values are existing in the database or not
		$query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
	 
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		$count = mysqli_num_rows($result);

	// 3.1.2 If the posted values are equal to the database values, then session will be created for the user.
		if ($count == 1){
			$_SESSION['username'] = $username;
		}
		else{
	// 3.1.3 If the login credentials doesn't match, he will be shown with an error message.
			$fmsg = "Invalid Login Credentials.";
		}
	}
	//3.1.4 if the user is logged in Greets the user with message
	if (isset($_SESSION['username'])){
		header('Location: index.php');
		echo $_SESSION['username'];
		//header('Location:'.$_SERVER['PHP_SELF']);
		// echo "<script>window.history.go(-1);</script>";
		// header('Location:index.php');
		exit;
	}
	else{
		//3.2 When the user visits the page first time, simple login form will be displayed.
	}
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
	<form "action="index.html" method="POST">
    	<!-- <div class="form-group">
      		<label for="email">Email:</label>
      		<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
    	</div> -->

    	<div class="form-group">
 			 <label for="usr">Username:</label>
 			 <input type="text" class="form-control" id="usr" placeholder="Enter username" name="usr" required pattern="^[a-z0-9_-]{3,15}$" title="Must contain atleast 3 characters">
		</div>

    	<div class="form-group">
      		<label for="pwd">Password:</label>
      		<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required pattern="^[a-z0-9_-]{6,15}$" title="Must contain atleast 6 characters">
   	    </div>

   	    <a href="signin.php" class="anchor"><b>Create an account</b></a>
   	    <br>
    	<button type="submit" class="btn btn-default btn-lg" style="background-color: #4162f6; color: white;">Login</button>
	</form>
</div>

</body>

</html>