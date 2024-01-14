<?php
require '../config.php';
require '../model/categorie.php';

$idCategory = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $modifiedCategoryName = $_POST['category-name'];

    $obj = categorie::modifyCategory($idCategory, $modifiedCategoryName);
    header('Location: ../dashboard-admin.php');
}
