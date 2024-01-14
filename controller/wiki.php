<?php
session_start();
include '../config.php';
include '../model/wiki.php';

$id_user = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = isset($_POST['wiki-name']) ? $_POST['wiki-name'] : '';
    $description = isset($_POST['description-wiki']) ? $_POST['description-wiki'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';

    if (empty($name) || empty($description) || empty($category)) {
        echo "Please fill out all required fields.";
        exit;
    }

    $tags = isset($_POST['tag']) ? implode(',', $_POST['tag']) : '';
    date_default_timezone_set("Africa/Casablanca");
    $date = date("Y-m-d H:i:s");

    $image = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : '';
    $img_size = isset($_FILES['file']['size']) ? $_FILES['file']['size'] : '';
    $tmp_name = isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name'] : '';
    $error = isset($_FILES['file']['error']) ? $_FILES['file']['error'] : '';

    if ($error === 0) {
        $img_ex = pathinfo($image, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);


        $new_image = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $img_upload_path = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $new_image;
        move_uploaded_file($tmp_name, $img_upload_path);
    } else {
        echo "File upload failed. Please try again.";
        exit;
    }

    $result = wiki::addwiki($name, $description, $category, $tags, $new_image, $date);
    header('Location: ../wiki-panel.php');
}
