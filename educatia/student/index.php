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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome cdn link  -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <title>EDUTUR || Learn</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="main">
        <div class="sidebar">
            <div class="profile_preview">
                <img src="../images/pic-1.jpg" class="image" alt="">
             
            </div>
            <hr>
            <nav class="links">
                <a href="./index.php" class="active"> <span><i class="fas fa-home"></i></span> Dashboard</a>
                <!-- <a href="./courses.php"> <span><i class="fas fa-graduation-cap"></i></span> Courses</a> -->
                <a href="./roadmap.php"> <span><i class="fa-solid fa-road"></i></span> Roadmap</a>
                <a href="./encrypt.php"> <span><i class="fa-solid fa-lock"></i></span> Encryption</a>
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
                            <h3><?php echo  $patient_details['name'];?></h3>
                            <span>Student</span> <br>
                        </div>
                        <ul>
                            <li><span>Full Name</span><?php echo  $patient_details['name'];?> </li>
                            <li><span>username</span><?php echo  $patient_details['username'];?> </li>
                            <li><span>email</span><?php echo  $patient_details['email'];?> </li>
                        </ul>
                        <div class="sidenav_links">
                            <a href="./index.php" class="active"> <span><i class="fas fa-home"></i></span> Dashboard</a>
                            <!-- <a href="./courses.php"> <span><i class="fas fa-graduation-cap"></i></span> Courses</a> -->
                            <a href="./roadmap.php"> <span><i class="fa-solid fa-road"></i></span> Roadmap</a>
                            <a href="./encrypt.php"> <span><i class="fa-solid fa-lock"></i></span> Encryption</a>
                            <a href="./decrypt.php"> <span><i class="fa-solid fa-unlock-keyhole"></i></i></span> Decryption</a>
                            <a href="./exams.php"> <span><i class="fa-regular fa-pen-to-square"></i></span> Exams</a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="main">
                <div class="quick_option">
                    <div class="row_stats">
                        <div class="data_container">
                            <div class="top">
                                 
                                <img src="../images/pic-2.jpg" alt="">
                                <p>Welcome to the course</p>
                            </div>
                            <hr>
                            
                                <br>
                                <a href="./courses.php">Get Started</a>
                        </div>
                        
                    </div>
                    

                </div>
                <div class="chart">
                    <canvas id="lineChart" width="600px" height="400px"></canvas>
                </div>

            </div>

            <footer>
                <p>&copy; copyright @2024 EDUTUR || all rights reserved</p>
            </footer>

            
    
        </div>
        
    </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
      // Get the canvas element
        var ctx = document.getElementById('lineChart').getContext('2d');

        // Define the data for the chart
        var data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My Dataset',
            backgroundColor: '#fff', // Background color for the area under the line
            borderColor: '#ff9900', // Border color for the line
            borderWidth: 2,
            data: [20, 50, 40, 25, 35, 30, 35] // Data points for the line chart
        }]
        };

        // Configure the options for the chart
        var options = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
            ticks: {
                beginAtZero: true
            }
            }]
        }
        };

        // Create the line chart
        var lineChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
        });

    });

    </script>
</body>

</html>