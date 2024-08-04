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
if(isset($_POST['adduser'])){
    // Fetch data from the form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note the typo here, it should be "password" instead of "passsword"

    // Insert user data into database
    $sql = "INSERT INTO users ( name, username, email, password)
     VALUES ( '$name', '$username', '$email', '$password')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "User added successfully!";
        header("Location: users.php");
        exit();
    } else {
        $_SESSION['status'] = "error";
        // $_SESSION['message'] = "Server Down";
         $_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($con);
        header("Location: ./users.php");
        exit();
    }
}
// Check if form is submitted
elseif(isset($_POST['loginbtn']))
    // Get user input
     $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $username = $_POST["username"];
   
    $password = $_POST["password"];

    // Check if form is submitted
if(isset($_POST['adduser'])){
    // Fetch data from the form
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note the typo here, it should be "password" instead of "passsword"

   

    $access_query= "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $access_query_run = mysqli_query($con,$access_query);
    

    if(mysqli_num_rows($access_query_run) > 0) {
        $row = mysqli_fetch_assoc($access_query_run); 
        
        $_SESSION['student_id']=$row['id'];
        
        $_SESSION['status'] = "success";
        $_SESSION['message']='You logged in successfully';
    
        header("Location: ./student/index.php ");
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

// Check if 'id' is set in the query string for deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
}
// Check if 'id' is set in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Prepare and bind
    $stmt = $con->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the admin management page with a success message
        $_SESSION['message'] = "User successfully deleted";
        header("Location: users.php");
    } else {
        // Redirect back with an error message
        $_SESSION['message'] = "Error deleting user";
        header("Location: users.php");
    }
    $stmt->close();
} else {
    // Redirect back with an error message if ID wasn't provided
    $_SESSION['message'] = "No user ID provided";
    header("Location: users.php");
}

$con->close();
?>

?>
