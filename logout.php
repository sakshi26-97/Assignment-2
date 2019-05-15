<?php
session_start();
session_destroy();
header('Location:index.php');
exit;
// echo "<script>window.history.go(-1);</script>";
?>



<?php
session_start();
unset($_SESSION['username']);
session_destroy();

header("Location: login.php");
exit;
?>