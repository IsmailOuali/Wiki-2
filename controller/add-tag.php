<?php
session_start();
include '../config.php';
require_once '../model/tag.php';


if (!$_POST){
    die("ERROR POST");
}

$tagName = $_POST['tag-name'];
$log = new tag(NULL, $tagName);
$result = $log->addtag($tagName);
    
header('Location: ../dashboard-admin.php');