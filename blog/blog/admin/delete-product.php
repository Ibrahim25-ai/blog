<?php
require 'config/database.php';

if (isset($_GET['id']) && isset($_SESSION['user_is_admin'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch command from database in order to delete thumbnail from images folder
    $query = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($connection, $query);

    // make sure only 1 record/command was fetched
    if (mysqli_num_rows($result) == 1) {
        $product = mysqli_fetch_assoc($result);
        $thumbnail_name = $product['thumbnail'];
        $thumbnail_path = '../images/' . $thumbnail_name;

        if ($thumbnail_path) {
            unlink($thumbnail_path);

            // delete product from database
            $delete_product_query = "DELETE FROM product WHERE id=$id LIMIT 1";
            $delete_product_result = mysqli_query($connection, $delete_product_query);

            if (!mysqli_errno($connection)) {
                $_SESSION['delete-command-success'] = "Command deleted successfully";
            }
        }
    }
}

header('location: ' . ROOT_URL . '/admin/index.php');
die();
