<?php

session_start();
require_once '../model/user.php';

if(!$_POST){
    header('Location: ../index.php');
}

if(@$_POST['register']){

    $nom = $_POST['name'];
    $email = $_POST['email'];


    $pwd = md5($_POST['password']);
}

$obj = new user();
$obj->adduser($nom, $email, $pwd);



header('Location: ../login.php');


