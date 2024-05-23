<?php
    // Connection details
    $host = "localhost";
    $user = "222016060";
    $pass = "222016060";
    $database = "online_sales_training_workshops_platform";

    // Creating connection
    $connection = new mysqli($host, $user, $pass, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
?>