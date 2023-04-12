<?php
require 'config/database.php';

if (isset($_GET['id']) && isset($_SESSION['user_is_admin'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // FOR LATER
    // udpate category_id of posts that belong to this category to id of uncategorized category
    $update_query = "UPDATE products SET pack_id=12 WHERE pack_id=$id";
    $update_result = mysqli_query($connection, $update_query);

    if (!mysqli_errno($connection)) {
        // delete category
        $query = "DELETE FROM packs WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        $_SESSION['delete-pack-success'] = "Pack deleted successfully";
    }
}
header('location: ' . ROOT_URL . 'admin/manage-packs.php');
die();
