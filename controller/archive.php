<?php

include '../config.php';
include '../model/wiki.php';

$r = $_GET['id'];

$obj = wiki::archivewiki($r);

header('Location: ../dashboard-admin.php');