<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blogs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function getAllBlogs() {
    global $conn;
    $sql = "SELECT b.*, u.name as ownerName, u.email as ownerEmail FROM Blogs b JOIN Users u ON b.owner = u.username";

    return $conn->query($sql);
}

?>