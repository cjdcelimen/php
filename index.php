<?php

    // connect to database
    $conn = mysqli_connect('localhost', 'cj', 'test1234', 'coffee_monster');

    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // query
    $sql = 'SELECT coffee, ingredients, id FROM coffee ORDER BY created_at';
    $result = mysqli_query($conn, $sql);
    // fetch the resulting rows as an array
    $coffees = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // free result from memory
    mysqli_free_result($result);
    // close connection
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text">Coffee Menu</h4>
    <div class="container">
        <div class="row">
            <?php foreach($coffees as $coffee){ ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($coffee['coffee']); ?></h6>
                            <div><?php echo htmlspecialchars($coffee['ingredients']) ?></div>
                        </div>
                        <div class="card-action right-align">
                            <a href="#" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>

</html>