<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];
    $prix_org =   filter_var($_POST['prix_org'], FILTER_SANITIZE_NUMBER_INT);
    $prix_aft =   filter_var($_POST['prix_aft'], FILTER_SANITIZE_NUMBER_INT);
    $pack_id = filter_var($_POST['pack'], FILTER_SANITIZE_NUMBER_INT);
    $promo = filter_var($_POST['promo'], FILTER_SANITIZE_NUMBER_INT);
    $new = filter_var($_POST['new'], FILTER_SANITIZE_NUMBER_INT);


    // set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ?: 0;

    // validate form data
    if (!$title) {
        $_SESSION['add-product'] = "Enter product title";
    } elseif (!$category_id) {
        $_SESSION['add-product'] = "Select product category";
    } elseif (!$body) {
        $_SESSION['add-product'] = "Enter product body";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-product'] = "Choose product thumbnail";
    }else {
        // WORK ON THUMBNAIL
        // rename the image
        $time = time(); // make each image name unique
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;
        // make sure file is an image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension);
        if (in_array($extension, $allowed_files)) {
            // make sure image is not too big. (2mb+)
            if ($thumbnail['size'] < 2000000) {
                // upload thumbnail
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            } else {
                $_SESSION['add-product'] = "File size too big. Should be less than 2mb";
            }
        } else {
            $_SESSION['add-product'] = "File should be png, jpg, or jpeg";
        }
    }

    // redirect back (with form data) to add-product page if there is any problem
    if (isset($_SESSION['add-product'])) {
        $_SESSION['add-product-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-product.php');
        die();
    } else {
        // set is_featured of all psots to 0 if is_featured for this post is 1
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE product SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }
    
        // insert post into database
        $query = "INSERT INTO products (title, body, thumbnail,promo,new, category_id,pack_id, author_id, is_featured,prix_org,prix_aft) VALUES ('$title', '$body', '$thumbnail_name',$promo,$new, $category_id,$pack_id, $author_id, $is_featured,$prix_org,$prix_aft)";
        
        $result = mysqli_query($connection, $query);
    
        if (!mysqli_errno($connection)) {
            $_SESSION['add-product-success'] = "New product added successfully";
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
    }
}

header('location: ' . ROOT_URL . 'admin/add-product.php');
die();
