<?php
session_start();
require '../config.php';
require_once '../model/user.php';

if(@$_POST['login']){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
}

$log = new user();
if(!$log->login($email, $password)){
    header('Location: ../login.php');
}
$_SESSION['id_user'] = $log->login($email, $password);
