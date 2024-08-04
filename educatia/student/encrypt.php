<?php
session_start();


$host = "localhost";
$username = "root";
$password = "";
$database = "edutur";

$con = mysqli_connect ($host, $username, $password, $database);

if (!$con) {
    die("connection failed:".mysqli_connect_error());
}
if (!isset($_SESSION['student_id'])) {
    header('Location: ../auth/index.php');
}

if (isset($_SESSION['student_id'])) {
    $student_id = $_SESSION['student_id'];
    $access_query= "SELECT * FROM users WHERE id='$student_id'";
    $access_query_run = mysqli_query($con,$access_query);
    $patient_details = mysqli_fetch_assoc($access_query_run);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <title>EDUTUR || Encryption</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="main">
        <div class="sidebar">
            <div class="profile_preview">
                <img src="../images/pic-1.jpg" class="image" alt="">
                <h3>User</h3> <br>
                <span>Student</span> <br>
                <!-- <p>Email: john.doe@example.com</p> -->
                <!-- <a href="">View Profile</a> -->
            </div>
            <hr>
            <nav class="links">
                <a href="./index.php"> <span><i class="fas fa-home"></i></span> Dashboard</a>
                <a href="./courses.php"> <span><i class="fas fa-graduation-cap"></i></span> Courses</a>
                <a href="./roadmap.php"> <span><i class="fa-solid fa-road"></i></span> Roadmap</a>
                <a href="./encrypt.php" class="active"> <span><i class="fa-solid fa-lock"></i></span> Encryption</a>
                <a href="./decrypt.php"> <span><i class="fa-solid fa-unlock-keyhole"></i></i></span> Decryption</a>
                <a href="./exams.php"> <span><i class="fa-regular fa-pen-to-square"></i></span> Exams</a>
            </nav>
        </div>

        <div class="content">
            <header>
                <div class="logo">
                    <a href="">
                        <h1><span>traders</span> cloud security</h1>
                    </a>
                </div>
                <form action="" method="post">
                    <input type="search" placeholder="search">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="buttons">
                    <button class="menu_btn" onclick="openNav()"><i onclick="openNav()" class="fa-solid fa-bars"></i></button>
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <div class="profile_preview">
                            <img src="../images/pic-1.jpg" class="image" alt="">
                            <h3>John Doe</h3>
                            <span>Student</span> <br>
                        </div>
                        <ul>
                            <li><span>Full Name</span><?php echo  $patient_details['name'];?> </li>
                            <li><span>username</span><?php echo  $patient_details['username'];?> </li>
                            <li><span>email</span><?php echo  $patient_details['email'];?> </li>
                        </ul>
                        <div class="sidenav_links">
                            <a href="./index.php" class="active"> <span><i class="fas fa-home"></i></span> Dashboard</a>
                            <a href="./courses.php"> <span><i class="fas fa-graduation-cap"></i></span> Courses</a>
                            <a href="./roadmap.php"> <span><i class="fa-solid fa-road"></i></span> Roadmap</a>
                            <a href="./encrypt.php"> <span><i class="fa-solid fa-lock"></i></span> Encryption</a>
                            <a href="./decrypt.php"> <span><i class="fa-solid fa-unlock-keyhole"></i></i></span> Decryption</a>
                            <a href="./exams.php"> <span><i class="fa-regular fa-pen-to-square"></i></span> Exams</a>
                        </div>
                </div>
            </header>
            <div class="main">
                <!--Encrypt Form-->
                <form class="encryption_form" method="post" action="change.php">
                    <h2>Encryption Form</h2>
                    <hr>
                    <label for="plaintext">Enter text to encrypt:</label><br>
                    <textarea name="plaintext" placeholder="Type in the TEXT Message you want to encrypt" id="plaintext" rows="4" cols="40"></textarea>
                    <br>
                    <br>
                    <label for="encryptionkey">Enter the encryption key:</label>
                    <br>
                    <input type="password" placeholder="Type in your encryption key" name="encryptionkey" id="encryptionkey">
                    <br>
                    <br>
                    <input type="submit" name="encrypt" value="Encrypt">
                </form>
            </div>
            <footer>
                <p>&copy; copyright @2024 EDUTUR || all rights reserved</p>
            </footer>



        </div>

    </div>
    <script>
        /* Set the width of the side navigation to 250px */
        function openNav() {
            document.getElementById("mySidenav").style.width = "80%";
        }

        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>