<?php 

$email = $coffee = $ingredients = '';
$errors = array('email' => '', 'coffee' => '', 'ingredients' => '');

    if(isset($_POST['submit'])){
        if(empty($_POST['email'])){
            $errors['email'] = 'Email is required. <br />';
        } else {
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Email must be a valid email address. <br />';
            }
        }
        if(empty($_POST['coffee'])){
            $errors['coffee'] = 'Coffee is required. <br />';
        } else {
            $coffee = $_POST['coffee'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $coffee)){
                $errors['coffee'] = 'Coffee must be letters and spaces only. <br />';
            }
        }
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'At least an ingredient is required. <br />';
        } else {
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = 'Ingredients must be comma separated. <br />';
            }
        } 

        if(array_filter($errors)){
            // form got errors
        } else {
            // no errors -> redirect
            header('Location: index.php');
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
            <input type='text' name='email' value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label>Coffee:</label>
            <input type='text' name='coffee' value="<?php echo htmlspecialchars($coffee) ?>">
            <div class="red-text"><?php echo $errors['coffee']; ?></div>
            <label>Ingredients (comma separated):</label>
            <input type='text' name='ingredients' value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            <div class="center">
                <input type='submit' name='submit' value='submit' class='btn brand z-depth-0'>
            </div>
        </form>
    </section>

    <?php include('templates/footer.php'); ?>

</html>