<?php
session_start();
    include '../model/user.php';

$usr = user::logout();
header('Location: ../login.php');

