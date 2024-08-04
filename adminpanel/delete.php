<?php

session_start(); // Start session if not already started

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "edutur";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Delete user
if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $query = "DELETE FROM `admins` WHERE id = '$id'";  
    $run = mysqli_query($con, $query);  
    if ($run) {  
        header('location: admins.php');  
        exit(); // Exit to prevent further execution
    } else {  
        echo "Error: " . mysqli_error($con);  
    }  
}

$con->close(); // Close connection
?>
