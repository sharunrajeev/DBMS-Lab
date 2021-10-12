<?php
    $mysqli = new mysqli("localhost", "sharun", "sharun2001", "taskmanager");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
?>