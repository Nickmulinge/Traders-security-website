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
    die("Connection failed: " . $con->connect_error); // corrected $conn to $con
}

// Check if form is submitted
if(isset($_POST['createaccount'])){
    // Fetch data from the form
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note the typo here, it should be "password" instead of "passsword"

    // Insert user data into database using prepared statement to prevent SQL injection
    $stmt = $con->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Admin added successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Error adding admin: " . $con->error;
        header("Location: index.php");
        exit();
    }
    $stmt->close(); // Close prepared statement
}

// Check if login form is submitted
elseif(isset($_POST['loginbtn'])){
    // Get user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("SELECT id FROM admins WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows > 0) {
        $stmt->bind_result($id);
        $stmt->fetch();
        $_SESSION['student_id'] = $id;
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "You logged in successfully";
        header("Location: ../adminpanel/admindashboard.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        $_SESSION['message'] = "Invalid Credentials";
        header('Location: ./admins.php');
        exit();
    }
    $stmt->close(); // Close prepared statement
}

// Check if 'id' is set in the query string for admin deletion
if (isset($_GET['id'])) {
    // Get the ID from the query string
    $id = $_GET['id'];

    // Prepare and bind
    $stmt = $con->prepare("DELETE FROM admins WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the admin management page with a success message
        $_SESSION['message'] = "Admin successfully deleted";
        header("Location: admins.php");
        exit(); // Stop further execution
    } else {
        // Redirect back with an error message
        $_SESSION['message'] = "Error deleting admin: " . $con->error;
        header("Location: admins.php");
        exit(); // Stop further execution
    }
    
    // Close statement
    $stmt->close();
}

// Close connection (moved to the end of the script)
$con->close();

?>
