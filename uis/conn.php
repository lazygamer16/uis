<?php
    $servername = "127.3.169.2";
    $username = "adminPaQ8nQa";
    $password = "kWA_f3T8W5tP";
    $dbname = "uis";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
?>
