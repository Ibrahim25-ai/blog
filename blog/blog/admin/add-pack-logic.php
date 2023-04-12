<?php
require 'config/database.php';

if (isset($_POST['submit']) && isset($_SESSION['user_is_admin'])) {
    // get form data
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);


    if (!$title) {
        $_SESSION['add-pack'] = "Enter title";
    }

    // redirect back to add pack page with form data if there was invalid input
    if (isset($_SESSION['add-pack'])) {
        $_SESSION['add-pack-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-pack.php');
        die();
    } else {
        // insert pack into database
        $query = "INSERT INTO packs (title) VALUES ('$title')";
        $result = mysqli_query($connection, $query);
        if (mysqli_errno($connection)) {
            $_SESSION['add-pack'] = "Couldn't add pack";
            header('location: ' . ROOT_URL . 'admin/add-pack.php');
            die();
        } else {
            $_SESSION['add-pack-success'] = "$title pack added successfully";
            header('location: ' . ROOT_URL . 'admin/manage-packs.php');
            die();
        }
    }
}
