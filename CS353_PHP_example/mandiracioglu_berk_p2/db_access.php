<?php
$servername = "dijkstra.cs.bilkent.edu.tr";
$username = "b.mandiracioglu";
$password = "jb9ryoe";
$dbname = "b_mandiracioglu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
