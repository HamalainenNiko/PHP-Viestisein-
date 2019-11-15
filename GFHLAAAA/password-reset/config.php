<?php 
session_start();
$token = "";
$errors = [];
$user_id="";

$db = mysqli_connect('localhost', 'root' ,'', 'multi_login');
?>