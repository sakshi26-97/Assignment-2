<?php
session_start();
session_destroy();
header('Location:login.php');
exit;
// echo "<script>window.history.go(-1);</script>";
?>
