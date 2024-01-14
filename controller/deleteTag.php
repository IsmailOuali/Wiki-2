<?php

include '../config.php';
include '../model/tag.php';

$r = $_GET['id'];

$obj = tag::deletetag($r);

header('Location: ../dashboard-admin.php');