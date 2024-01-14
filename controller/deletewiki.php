<?php

include '../config.php';
include '../model/wiki.php';

$r = $_GET['id'];

$obj = wiki::deletewiki($r);

header('Location: ../wiki-panel.php');