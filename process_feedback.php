<?php
session_start();

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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_names = $_POST['full_names'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phone_number'];
    $message = $_POST['message'];

    // Insert data into feedback table
    $sql = "INSERT INTO feedback (full_names, email, phone_number, message) VALUES ('$full_names', '$email', '$phone_number', '$message')";
    if ($con->query($sql) === TRUE) {
        $_SESSION['notification'] = "Feedback submitted successfully.";
        header('location: #feedback'); // Redirect to feedback page after submission
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

$con->close();
?>
