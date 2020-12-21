<?php

    // connect to database
    $conn = mysqli_connect('localhost', 'cj', 'test1234', 'coffee_monster');

    // check connection
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>