<?php
  require('connect.php');
    // If the values are posted, insert them into the database.
    // if (isset($_POST['submit']))
    // {
    //   echo "<script type='text/javascript'>alert('submit');</script>";
    // }

    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = mysqli_real_escape_string($connection,$_POST['username']);
        $password = md5($_POST['password']);
        ob_start();
        $query = "INSERT INTO `users` (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($connection, $query);
        if($result)
        {
          header('Location:index.php');
        }
        else
        {
          echo(" Error description: " . mysqli_error($connection));;
        }
        ob_end_flush();
        // if($result){
        //     // $smsg = "User Created Successfully.";
        // echo "<script type='text/javascript'>console.log('Successfully');</script>";
        // // echo "<script> window.location.assign('login.php'); </script>";
        // header('Location:login.php');

        // }else{
        //   echo "<script type='text/javascript'>console.log('failed');</script>";
        //     // $fmsg = "User Registration Failed";
        // }
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
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container box">
<!-- 
  <?php if(isset($smsg)){ ?>
    <div class="alert alert-success" role="alert"> 
      <?php echo $smsg; ?> 
      </div>
  <?php } ?>

  <?php if(isset($fmsg)){ ?>
    <div class="alert alert-danger" role="alert"> 
      <?php echo $fmsg; ?>
       </div>
  <?php } ?> -->

	<h2 style="text-align: center;">SIGN IN</h2>
	<form method="POST" action="">
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