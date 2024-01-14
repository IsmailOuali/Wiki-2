<?php

include '../config.php';
include '../model/categorie.php';

$r = $_GET['id'];

$obj = categorie::deletecategory($r);

header('Location: ../dashboard-admin.php');