<?php
require '../config.php';
require '../model/tag.php';

$idTag = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $modifiedTagName = $_POST['tag-name'];

    $obj = tag::modifyTag($idTag, $modifiedTagName);
    header('Location: ../dashboard-admin.php');
}
