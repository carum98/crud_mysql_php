<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM task WHERE id = $id";
        $result = mysqli_query($con, $query);

        if (!$result) {
            die('Query filed');
        }

    $_SESSION['message'] = 'Task Delete succesfully';
    $_SESSION['message_type'] = 'danger';
    
    header("Location: index.php");
    }

?>