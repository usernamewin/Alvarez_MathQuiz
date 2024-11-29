<?php

$servername = "localhost";
$username = "root";
$password = "root";
$database = "quiz";

$conn = new mysqli ($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo ("Connection Failed: " . $conn->connect_error);
}
// else {
//     echo "Connection Successful.";
// }
 
?>