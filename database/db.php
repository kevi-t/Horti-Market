<?php

    $serverName = "localhost";
    $userName = "horti";
    $password = "horti1234";
    $dbName = "horticulture-market";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

?>
