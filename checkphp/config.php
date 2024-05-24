<?php
// $servername = "localhost";
// $username = "cuscode_wag10";
// $password = "ciswag10";
// $dbname = "cuscode_wag10";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "board";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{

    mysqli_set_charset($conn, "utf8");
}


?>