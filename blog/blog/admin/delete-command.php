<?php
require 'config/database.php';

if (isset($_GET['id']) && isset($_SESSION['user_is_admin'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch command from database in order to delete thumbnail from images folder
    $query = "SELECT * FROM commande WHERE id=$id";
    $result = mysqli_query($connection, $query);

    // make sure only 1 record/command was fetched
    if (mysqli_num_rows($result) == 1) {
        

            // delete command from database
            $delete_command_query = "DELETE FROM commande WHERE id=$id LIMIT 1";
            $delete_command_result = mysqli_query($connection, $delete_command_query);

            if (!mysqli_errno($connection)) {
                $_SESSION['delete-command-success'] = "Command deleted successfully";
            
        }
    }
}

header('location: ' . ROOT_URL . '/admin/manage-commands.php');
die();
