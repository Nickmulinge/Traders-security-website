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
    <title>EDUTUR || Roadmap</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <div class="profile_preview">
                <img src="../images/pic-1.jpg" class="image" alt="">
                <h3>User</h3> <br>
                <span>Student</span> <br>

            </div>
            <hr>
            <nav class="links">
                <a href="./index.php"> <span><i class="fas fa-home"></i></span> Dashboard</a>
                <a href="./courses.php"> <span><i class="fas fa-graduation-cap"></i></span> Courses</a>
                <a href="./roadmap.php"  class="active" > <span><i class="fa-solid fa-road"></i></span> Roadmap</a>
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
            <div class="timeline">
                <div class="container left">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Introduction to Cloud Computing Security</h2>
                        <hr>
                        <p>This chapter provides an overview of cloud computing and its security challenges, emphasizing the need for robust
                        security measures..</p>
                        <span class="left_container_arrow"></span>
                    </div>
                </div>
                <div class="container right">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Cloud Service Models and Deployment Models:</h2>
                        <hr>
                        <p>Explains different cloud service and deployment models and discusses their security implications, helping students
                        understand how security requirements vary across different cloud setups.</p>
                        <span class="right_container_arrow"></span>
                    </div>
                </div>
                <div class="container left">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Cloud Security Threats and Risks</h2>
                        <hr>
                        <p>Covers common threats and risks in cloud computing, such as data breaches and denial of service attacks, and discusses
                        mitigation strategies.</p>
                        <span class="left_container_arrow"></span>
                    </div>
                </div>
                <div class="container right">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Security Governance and Compliance:</h2>
                        <hr>
                        <p>Discusses governance frameworks and compliance requirements relevant to cloud environments, ensuring students understand
                        the importance of adhering to industry regulations.</p>
                        
                        <span class="right_container_arrow"></span>
                    </div>
                </div>
                <div class="container left">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Identity and Access Management (IAM):</h2>
                        <hr>
                        <p>Explores principles of IAM, including authentication and authorization mechanisms, helping students learn how to manage
                        user access securely in the cloud.</p>
                        <span class="left_container_arrow"></span>
                    </div>
                </div>
                <div class="container right">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Data Security in the Cloud:</h2>
                        <hr>
                        <p>Addresses data protection measures such as encryption and key management, as well as compliance considerations like data
                        residency requirements.</p>
                        <span class="right_container_arrow"></span>
                    </div>
                </div>
                <div class="container left">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Network Security</h2>
                        <hr>
                        <p>Covers network security controls such as firewalls and intrusion detection systems, focusing on securing communication
                        channels within cloud environments..</p>
                        <span class="left_container_arrow"></span>
                    </div>
                </div>
                <div class="container right">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Securing Cloud Applications:</h2>
                        <hr>
                        <p>Discusses best practices for securing both cloud-native and migrated applications, highlighting the importance of secure
                        coding and application-level security controls.</p>
                        
                        <span class="right_container_arrow"></span>
                    </div>
                </div>
                <div class="container left">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Security Monitoring and Incident Response</h2>
                        <hr>
                        <p>Teaches techniques for monitoring cloud environments for security incidents and responding effectively to breaches,
                        ensuring students are equipped to handle security incidents.</p>
                        <span class="left_container_arrow"></span>
                    </div>
                </div>
                <div class="container right">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Cloud Security Best Practices and Case Studies:</h2>
                        <hr>
                        <p>Provides real-world examples of cloud security best practices and case studies of security breaches, helping students
                        understand practical implications of security measures.</p>
                        <span class="right_container_arrow"></span>
                    </div>
                </div>
                <div class="container left">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Emerging Trends in Cloud Security</h2>
                        <hr>
                        <p>Explores emerging technologies and trends in cloud security, preparing students to adapt to evolving threats and
                        security requirements.</p>
                        <span class="left_container_arrow"></span>
                    </div>
                </div>
                <div class="container right">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Practical Labs and Exercises:</h2>
                        <hr>
                        <p>Offers hands-on labs and exercises where students can apply theoretical knowledge to practical scenarios, gaining
                        experience in configuring security controls in cloud platforms.</p>
                        
                        <span class="right_container_arrow"></span>
                    </div>
                </div>
                <div class="container left">
                    <img src="../images/pic-1.jpg" alt="">
                    <div class="text_box">
                        <h2>Final Project or Capstone:</h2>
                        <hr>
                        <p>Concludes the course with a final project or capstone where students demonstrate their understanding of cloud security
                        concepts by designing and implementing a security solution for a hypothetical cloud environment.</p>
                        <span class="left_container_arrow"></span>
                    </div>
                </div>
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