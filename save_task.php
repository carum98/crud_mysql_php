<?php

include ("db.php");

if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO task(title, descripcion) VALUES ('$title', '$descripcion')";
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query fail");
    }

    $_SESSION['message'] = 'Task Saved succesfully';
    $_SESSION['message_type'] = 'success';
    
    header("Location: index.php");
}

?>