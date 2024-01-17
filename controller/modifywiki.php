<?php
session_start();
require '../config.php';
require '../model/wiki.php';


$id_wiki = $_GET['id-wiki'];

    
    $modifiedName = $_POST['wiki-name'];
    $modifiedCategory = $_POST['category'];
    $modifiedDescription = $_POST['description-wiki'];

    $obj =  wiki::modifywiki($id_wiki, $modifiedName, $modifiedCategory, $modifiedDescription);
    
    header('Location: ../wiki-panel.php');
