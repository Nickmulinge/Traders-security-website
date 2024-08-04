<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "edutur";

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['student_id'])) {
    header('Location: ../auth/index.php');
}

try {
    $sql = "SELECT id, username, password, email FROM admins";
    $result = $con->query($sql);
    
    if ($result) {
        $admins = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        throw new Exception("Query failed: " . $con->error);
    }
} catch (Exception $e) {
    die("An error occurred while fetching admin details: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin management</title>
    <link rel="stylesheet" href="stylead.css">
</head>
<body>
<button style="background-color: #ff9900; padding: 10px 20px; border: none; color: #fff; cursor: pointer; border-radius: 5px;">
    <a href="./admindashboard.php" style="text-decoration: none; color: #fff;">Back to dashboard</a>
</button>

    <div class="content">
        <h1>Admin Details</h1>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin): ?>
                    <tr>
                    <td><?= htmlspecialchars($admin['id']) ?></td>
                        <td><?= htmlspecialchars($admin['username']) ?></td>
                        <td><?= htmlspecialchars($admin['email']) ?></td>
                        <td><?= htmlspecialchars($admin['password']) ?></td>
                        
                            <!-- <button><a href="">Edit</a></button> -->
                            <td><a href='delete.php?id=<?= htmlspecialchars($admin['id']) ?>' id='btn'>Delete</a></td>


    
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button><a class="login_btn" href="./createadmin.php">Add admin</a></button>
    </div>
</body>
</html>
