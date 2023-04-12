<?php
require 'config/database.php';

if (isset($_POST['submit']) && isset($_SESSION['user_is_admin'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // validate input
    if (!$title ) {
        $_SESSION['edit-pack'] = "Invalid form input on edit pack page";
    } else {
        $query = "UPDATE packs SET title='$title' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_errno($connection)) {
            $_SESSION['edit-pack'] = "Couldn't update pack";
        } else {
            $_SESSION['edit-pack-success'] = "pack $title updated successfully";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/manage-packs.php');
die();
