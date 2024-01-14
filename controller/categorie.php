<?php
session_Start();
require '../config.php';
require_once '../model/categorie.php';

if (!$_POST){
    die("ERROR POST");
}

    $name = $_POST['category-name'];

$obj = categorie::addcategory($name);


header('Location: ../dashboard-admin.php');