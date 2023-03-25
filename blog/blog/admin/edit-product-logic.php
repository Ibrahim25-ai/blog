<?php
require 'config/database.php';

// make sure edit product button was clicked
if (isset($_POST['submit']) && isset($_SESSION['user_is_admin'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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

    // set is_featured to 0 if it was unchecked
    $is_featured = $is_featured == 1 ?: 0;

    // check and validate input values
    if (!$title) {
        $_SESSION['edit-product'] = "Couldn't update product. Invalid form data on edit product page1.";
    } elseif (!$category_id) {
        $_SESSION['edit-product'] = "Couldn't update product. Invalid form data on edit product page2.";
    } elseif (!$body) {
        $_SESSION['edit-product'] = "Couldn't update product. Invalid form data on edit product page3.";
    } else {
        // delete existing thumbnail if new thumbail is available
        if ($thumbnail['name']) {
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            if ($previous_thumbnail_path) {
                unlink($previous_thumbnail_path);
            }

            // WORK ON NEW THUMBNAIL
            // Rename image
            $time = time(); // make each image name upload unique using current timestamp
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name;

            // make sure file is an image
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);
            if (in_array($extension, $allowed_files)) {
                // make sure avatar is not too large (2mb+)
                if ($thumbnail['size'] < 2000000) {
                    // upload avatar
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                } else {
                    $_SESSION['edit-product'] = "Counldn't update product. Thumbnail size too big. Should be less than 2mb";
                }
            } else {
                $_SESSION['edit-product'] = "Counldn't update product. Thumbnail should be png, jpg or jpeg";
            }
        }
    }

    if ($_SESSION['edit-product']) {
        // redirect to manage form page if form was invalid
        header('location: ' . ROOT_URL . 'admin/');
        die();
    } else {
   
        // set is_featured of all products to 0 if is_featured for this product is 1
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE products SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }

        // set thumbnail name if a new one was uploaded, else keep old thumbnail name
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        $query = "UPDATE products SET title='$title', body='$body', thumbnail='$thumbnail_to_insert',promo=$promo,new=$new, category_id=$category_id,pack_id=$pack_id, is_featured=$is_featured,prix_org=$prix_org,prix_aft=$prix_aft WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
        
    }


    if (!mysqli_errno($connection)) {
        $_SESSION['edit-product-success'] = "product updated successfully";
    }}
    header('location: ' . ROOT_URL . 'admin/');
    die();
    
