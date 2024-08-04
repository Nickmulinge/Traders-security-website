<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <title>Admin login</title>
</head>
<body>
    <button class="back_btn" onclick="goBack()"><i class="fa-solid fa-circle-left"></i>Go back </button>
    <!-- <a href="../adminlogin/index.php" class="adminlogin_btn"><i class="fa-solid fa-ranking-star"></i>ADMIN LOGIN</a> -->
    <!-- <button class="back_btn"><i class="fa-solid fa-ranking-star"></i>Go back </button> -->
    <form action="./auth.php" method="post">
        <h2 align="center">Welcome back admin</h2>
        <hr>
        <label for="username">Username</label>
        <input type="text" placeholder="username" id="username" name="username">
        <input type="password" name="password" id="password" placeholder="password">
        <br><br>
        <button type="submit" class="submitbtn" name="loginbtn">LOGIN</button>
        <br><br>
        <!-- <p align="center">You Dont have an account? then <a href="./create.php">Add admin</a></p> -->
    </form>
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
    <script>
        // Check if the session message is set
        <?php if(isset($_SESSION['message'])): ?>
            // Display SweetAlert with session message
            Swal.fire({
                title: 'EDUTUR',
                text: '<?php echo $_SESSION['message']; ?>',
                icon: '<?php echo $_SESSION['status']; ?>',
                confirmButtonText: 'OK'
            });
            // Clear the session message after displaying it
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
    </script>

    <?php
        if (isset($_SESSION['student_id'])) {
            $_SESSION['message'] = "Already logged in";
            $_SESSION['status'] = "success";
            header('Location: ../adminpanel/admindasboard.php ');
        }
    ?>
</body>
</html>