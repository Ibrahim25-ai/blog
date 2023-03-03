<?php
require 'config/database.php';

var_dump("tesst");
if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $adresse = filter_var($_POST['adr'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tel =   filter_var($_POST['tel'], FILTER_SANITIZE_NUMBER_INT);
    var_dump($name);


    // set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ?: 0;

    // validate form data
    if (!$name) {
        $_SESSION['add-command'] = "Enter command title";
    } elseif (!$tel) {
        $_SESSION['add-command'] = "Select command category";
    } elseif (!$adresse) {
        $_SESSION['add-command'] = "Enter command body";
    }

    // redirect back (with form data) to add-command page if there is any problem
    if (isset($_SESSION['add-command'])) {
        $_SESSION['add-command-data'] = $_POST;
    
        header('location: ' . ROOT_URL . 'producttest.php?id='.$id);
        die();
    } else {
        // set is_featured of all psots to 0 if is_featured for this post is 1
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE command SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }
    
        // insert post into database
        $query = "INSERT INTO commande (name, email, tel,product_id,adresse) VALUES ('$name', '$email', $tel,$id,'$adresse')";

        $result = mysqli_query($connection, $query);
        var_dump($result);
        var_dump($query);
        echo "tessst";
        if (!mysqli_errno($connection)) {
            $_SESSION['add-command-success'] = "New command added successfully";
            header('location: ' . ROOT_URL. 'blog.php' );
            die();
        }
    }
}
header('location: ' . ROOT_URL . 'blog.php');
die();
