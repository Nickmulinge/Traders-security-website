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
    $sql = "SELECT id, full_names, email, phone_number, message  FROM feedback";

    $result = $con->query($sql);
    
    if ($result) {
        $feedback = $result->fetch_all(MYSQLI_ASSOC);
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
    <title>Feedback center</title>
    <link rel="stylesheet" href="stylead.css">
</head>
<body>
<button style="background-color: #ff9900; padding: 10px 20px; border: none; color: #fff; cursor: pointer; border-radius: 5px;">
    <a href="./admindashboard.php" style="text-decoration: none; color: #fff;">Back to dashboard</a>
</button>

    <div class="content">
        <h1>Feedbacks</h1>
        <table>
            <thead>
                <tr>
                <th>ID</th>
                    <th>Full names</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feedback as $feedback): ?>
                    <tr>
                    <td><?= htmlspecialchars($feedback['id']) ?></td>
                        <td><?= htmlspecialchars($feedback['full_names']) ?></td>
                        <td><?= htmlspecialchars($feedback['email']) ?></td>
                        <td><?= htmlspecialchars($feedback['phone_number']) ?></td>
                        <td><?= htmlspecialchars($feedback['message']) ?></td>
                            <!-- <button><a href="">Edit</a></button> -->
                            <td><a href="mailto:<?= htmlspecialchars($feedback['email']) ?>?subject=Reply to Feedback" id="btn">Give response</a></td>


    
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
       
    </div>
</body>
</html>
