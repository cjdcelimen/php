<?php

    include('config/db_connect.php');

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM coffee WHERE id = $id_to_delete";
    
        if(mysqli_query($conn, $sql)){
            // success -> redirect
            header('Location: index.php');
        } else {
            // failure
            echo 'query error: ' . mysqli_error($conn);
        }
    }

    // check GET request ID params
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // query
        $sql = "SELECT * FROM coffee WHERE id = $id";

        // results
        $result = mysqli_query($conn, $sql);

        // fetch result in array format
        $coffee = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

    }

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <div class="container center grey-text">
        <?php if($coffee): ?>
            <h4><?php echo htmlspecialchars($coffee['coffee']); ?></h4>
            <p>Created by: <?php echo htmlspecialchars($coffee['email']); ?></p>
            <p><?php echo date($coffee['created_at']); ?></p>
            <h5>Ingredients:</h5>
            <p><?php echo htmlspecialchars($coffee['ingredients']); ?></p>

            <!-- DELETE FORM -->
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $coffee['id'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            </form>

        <?php else: ?>
            <h5>No such coffee exists</h5>
        <?php endif; ?>
    </div>

    <?php include('templates/footer.php'); ?>

</html>