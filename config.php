<?php
    session_start();
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "db_startit";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>