<?php
include'../function/function.php';
session_start();
session_destroy();
header("location: ../support/login.php");

?>
