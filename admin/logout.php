<?php
//Include constants.php for SITEURL
include('../config/init.php');
//1. Destory the Session
session_destroy(); //Unsets $_SESSION['user']

//2. REdirect to Login Page
$_SESSION['logout_msg'] = "Logout Successful" ;
header('location:'.SITEURL);
?>