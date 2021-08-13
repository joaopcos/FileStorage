<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = null;
$dbName = "file_storage";

$dbConnection = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}
    //Connection established!