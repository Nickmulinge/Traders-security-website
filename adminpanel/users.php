<?php
session_start();


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


if (!$con) {
    die("connection failed:".mysqli_connect_error());
}
if (!isset($_SESSION['student_id'])) {
    header('Location: ../auth/index.php');
}
/// Attempt to fetch admin details from the database
try {
      // Corrected SQL statement (removed the extra comma)
      $sql = "SELECT id, username, name, email, password FROM users";
    
      // Execute the query using MySQLi instead of PDO
      $result = $con->query($sql);
      
      if ($result) {
          // Fetch all results into an associative array if the query was successful
          $users = $result->fetch_all(MYSQLI_ASSOC);
      } else {
          // Handle the error if the query failed
          throw new Exception("Query failed: " . $con->error);
      }
  } catch (Exception $e) {
      // Handle any errors that occur during the fetch operation
      die("An error occurred while fetching admin details: " . $e->getMessage());
  }
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users management</title>
    <link rel="stylesheet" href="stylead.css">
</head>
<body>
<button style="background-color: #ff9900; padding: 10px 20px; border: none; color: #fff; cursor: pointer; border-radius: 5px;">
    <a href="./admindashboard.php" style="text-decoration: none; color: #fff;">Back to dashboard</a>
</button>

    <div class="content">
        <h1>Users details</h1>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                <th>Full name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $users): ?>
                    <tr>
                    <td><?= htmlspecialchars($users['id']) ?></td>
                        <td><?= htmlspecialchars($users['name']) ?></td>
                        <td><?= htmlspecialchars($users['username']) ?></td>
                        <td><?= htmlspecialchars($users['email']) ?></td>
                        <td><?= htmlspecialchars($users['password']) ?></td>
                       
                        
                        <td><a  href='deleteuser.php?id=<?= htmlspecialchars($users['id']) ?>' id='btn'>Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       <button> <a class="login_btn" href="./adduser.php">Add user</a> </button>
    </div>
</body>
</html>
