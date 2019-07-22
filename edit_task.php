<?php
    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $decripcion = $row['descripcion'];
        }
    }


    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $decripcion = $_POST['descripcion'];

        $query = "UPDATE task set title = '$title', descripcion = '$decripcion' WHERE id = $id";
        $result = mysqli_query($con, $query);

        $_SESSION['message'] = 'Task Edit succesfully';
        $_SESSION['message_type'] = 'warning';

        header("Location: index.php");
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control"><?php echo $decripcion ?></textarea>
                    </div>

                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>