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
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if(isset($_POST['createaccount'])){
    // Fetch data from the form
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note the typo here, it should be "password" instead of "passsword"

    // Insert user data into database
    $sql = "INSERT INTO users (name, username, email, password)
     VALUES ('$fullname', '$username', '$email', '$password')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "User registered successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        // $_SESSION['message'] = "Server Down";
         $_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($con);
        header("Location: ./create.php");
        exit();
    }
}
// Check if form is submitted
elseif(isset($_POST['loginbtn'])){
    // Get user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    $access_query= "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $access_query_run = mysqli_query($con,$access_query);
    

    if(mysqli_num_rows($access_query_run) > 0) {
        $row = mysqli_fetch_assoc($access_query_run); 
        
        $_SESSION['student_id']=$row['id'];
        
        $_SESSION['status'] = "success";
        $_SESSION['message']='You logged in successfully';
    
        header("Location: ../student/index.php");
        exit();
        
    }else{
        $_SESSION['status'] = "error";  
        $_SESSION['message']='Invalid Credentials';
        header('Location: ./index.php');
        exit();
    }
} 
// Close connection
$con->close();
?>
