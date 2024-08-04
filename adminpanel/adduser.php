
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <title>create account</title>
</head>

<body>
    <button class="back_btn" onclick="goBack()"><i class="fa-solid fa-circle-left"></i>Go back </button>
    <form action="./userauth.php" method="post">
        <h2 align="center">Add user</h2>
        <hr>
        <label for="name">Full name</label>
        <input type="text" placeholder="name" id="" name="name">

        <label for="username">Username</label>
        <input type="text" placeholder="username" id="username" name="username">

        <label for="email">Email</label>
        <input type="email" placeholder="Email Adress" id="email" name="email">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="password">

        <br><br>

        <button type="submit" class="submitbtn" name="adduser">Add user</button>
        <br><br>
        <!-- <p align="center">You have an account? <a href="./index.php">login</a></p> -->
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
</body>

</html>