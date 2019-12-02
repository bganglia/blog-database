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

function getBlog($id) {
    global $conn;
    $sql = $conn->prepare("SELECT b.*, u.name as ownerName, u.email as ownerEmail FROM Blogs b JOIN Users u ON b.owner = u.username WHERE b.id = ?");
    $sql->bind_param("i", $id);

    return $sql;
}

function deleteBlog($id) {
    global $conn;
    $sql = $conn->prepare("DELETE FROM Blogs WHERE id = ?");
    $sql->bind_param("i", $id);

    return $sql;
}

?>