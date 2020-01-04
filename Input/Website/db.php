<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn =  new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE DATABASE IF NOT EXISTS clinical_database";
$conn->query($sql);
$sql = "USE clinical_database";
$conn->query($sql);
?>
