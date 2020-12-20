<?php 

    if(isset($_POST['submit'])){
        if(empty($_POST['email'])){
            echo 'Email is required. <br />';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo 'Email must be a valid email address. <br />';
            }
        }
        if(empty($_POST['coffee'])){
            echo 'Coffee is required. <br />';
        } else {
            $coffee = $_POST['coffee'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $coffee)){
                echo 'Coffee must be letters and spaces only. <br />';
            }
        }
        if(empty($_POST['ingredients'])){
            echo 'At least an ingredient is required <br />';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                echo 'Ingredients must be comma separated. <br />';
            }
        }
    }

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add a Coffee</h4>
        <form action="add.php" class="white" method="POST">
            <label>Your Email:</label>
            <input type='text' name='email'>
            <label>Coffee:</label>
            <input type='text' name='coffee'>
            <label>Ingredients (comma separated):</label>
            <input type='text' name='ingredients'>
            <div class="center">
                <input type='submit' name='submit' value='submit' class='btn brand z-depth-0'>
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>

</html>