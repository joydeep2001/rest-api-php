<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " + $conn);
        return;
    } else {
        //echo "connection success";
    }
?>