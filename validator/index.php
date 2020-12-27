<?php

require('validator.php');

    if(isset($_POST['submit'])){
        // session
        session_start();
        $_SESSION['username'] = $_POST['username'];

        // validate inputs
        $validator = new Validator($_POST);
        $errors = $validator->validateForm();
        if(!$errors){
            // success -> redirect
            header('Location: ../index.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="new-user">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '') ?>">
            <div class="error">
                <?php echo $errors['username'] ?? '' ?>
            </div>

            <label>Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? '') ?>">
            <div class="error">
                <?php echo $errors['email'] ?? '' ?>
            </div>

            <input type="submit" value="submit" name="submit">
        </form>
    </div>
</body>
</html>