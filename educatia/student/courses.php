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
    <title>EDUTUR || Courses</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="main">
        <div class="sidebar">
            <div class="profile_preview">
                <img src="../images/pic-1.jpg" class="image" alt="">
                <h3></h3> <br>
                <span>Student</span> <br>
                
                            </div>
            <hr>
            <nav class="links">
                <a href="./index.php"> <span><i class="fas fa-home"></i></span> Dashboard</a>
                <a href="./courses.php"  class="active" > <span><i class="fas fa-graduation-cap"></i></span> Courses</a>
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
            <div class="course_chapters">
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Data Encryption and Security.</h2>
                        <!-- <button class="mark-as-done">Mark as Done</button> -->

                    </div>
                    <hr>
                    <p class="chapter-intro">

Importance of encrypting sensitive trading data.
Methods such as AES and RSA.
Significance of strong encryption keys and secure key management.</p>
                   
                </div>
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Data Encryption and Security.</h2>
                        <!-- <button class="mark-as-done">Mark as Done</button> -->

                    </div>
                    <hr>
                    <p class="chapter-intro">

Explanation of encryption and its role in protecting sensitive trading data.<br>
Introduction to encryption methods such as AES (Advanced Encryption Standard) and RSA (Rivest-Shamir-Adleman).<br>
Importance of strong encryption keys and secure key management practices to prevent unauthorized access.<br>
Implementation of encryption protocols for data in transit and data at rest in cloud storage.<br>
Compliance requirements and industry standards for data encryption in financial trading.<br></p>
                    
                </div>
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Multi-Factor Authentication (MFA).</h2>
                       

                    </div>
                    <hr>
                    <p class="chapter-intro">

Adding an extra layer of security.<br>
Methods like SMS codes, authenticator apps, and biometrics.<br>
Importance of enabling MFA for cloud trading accounts..</p>
                   
                </div>
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Data Backup and Disaster Recovery.</h2>
                        

                    </div>
                    <hr>
                    <p class="chapter-intro">

                    

Regular backup of trading data in the cloud.
Disaster recovery plans and off-site backups.
Testing backup and recovery processes.</p>
                    
                </div>
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Secure Cloud Storage Practices.</h2>
                 

                    </div>
                    <hr>
                    <p class="chapter-intro">

Importance of secure cloud storage practices in safeguarding trading data from unauthorized access and data breaches.
Guidelines for selecting reputable cloud storage providers with strong security measures and compliance certifications (e.g., SOC 2, ISO 27001).
Explanation of access controls, encryption, and data segregation features offered by cloud storage services.
Strategies for implementing role-based access control (RBAC) and least privilege access to limit data exposure.
Regular audit and review of access permissions, user activity logs, and security configurations to ensure compliance with regulatory requirements and industry standards.</p>
        
                </div>
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Network Security and Firewall Configuration.</h2>
                       

                    </div>
                    <hr>
                    <p class="chapter-intro">

Overview of network security principles and the role of firewalls in protecting trading systems and data.
Explanation of firewall types (e.g., network-based firewalls, host-based firewalls) and their deployment options in cloud environments.
Best practices for configuring firewall rules, including whitelisting trusted IP addresses, blocking unauthorized access attempts, and logging network traffic for analysis.
Implementation of intrusion detection and prevention systems (IDS/IPS) to detect and respond to suspicious network activities.
Continuous monitoring of network traffic, vulnerability scanning, and penetration testing to identify and mitigate security risks in cloud-based trading infrastructure.</p>
                    
                </div>
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Regular Software Updates and Patch Management.</h2>
                        

                    </div>
                    <hr>
                    <p class="chapter-intro">

Importance of maintaining up-to-date software and applying security patches promptly to protect against known vulnerabilities and exploits.
Explanation of the software update lifecycle, including release cycles, patch deployment methods, and testing procedures.
Implementation of automated patch management solutions to streamline the patching process and reduce the risk of human error.
Strategies for prioritizing critical security updates, conducting risk assessments, and scheduling maintenance windows to minimize service disruptions.
Collaboration with software vendors, security researchers, and industry peers to stay informed about emerging threats and recommended security updates for trading platforms and related software components.</p>
                    
                </div>
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Data Backup and Disaster Recovery.
</h2>
                      

                    </div>
                    <hr>
                    <p class="chapter-intro">
Explanation of data backup and disaster recovery (DR) strategies to ensure business continuity and resilience in the event of data loss or system outages.
Importance of regular backups of trading data stored in the cloud, including transaction records, account settings, and historical market data.
Implementation of automated backup solutions, off-site storage options, and redundant data copies to protect against hardware failures, ransomware attacks, and natural disasters.
Development and testing of comprehensive disaster recovery plans (DRPs) outlining procedures for data restoration, failover to secondary systems, and communication with stakeholders during emergencies.
Conducting periodic disaster recovery drills, tabletop exercises, and post-incident reviews to validate recovery procedures, identify areas for improvement, and enhance the organization's overall resilience to cloud-related risks.</p>
                    
                </div>
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Regular Software Updates and Patch Management.</h2>
                       

                    </div>
                    <hr>
                    <p class="chapter-intro">

Importance of maintaining up-to-date software and applying security patches promptly to protect against known vulnerabilities and exploits.
Explanation of the software update lifecycle, including release cycles, patch deployment methods, and testing procedures.
Implementation of automated patch management solutions to streamline the patching process and reduce the risk of human error.
Strategies for prioritizing critical security updates, conducting risk assessments, and scheduling maintenance windows to minimize service disruptions.
Collaboration with software vendors, security researchers, and industry peers to stay informed about emerging threats and recommended security updates for trading platforms and related software components.</p>
                    
                </div>
                
                <div class="chapter">
                    <div class="top">
                        <h2 class="chapter-heading">Secure Network Connections.</h2>
                     

                    </div>
                    <hr>
                    <p class="chapter-intro">

Avoid using public or unsecured Wi-Fi networks when accessing cloud services, especially for sensitive tasks.
Use a virtual private network (VPN) to encrypt internet traffic and establish a secure connection to cloud resources.
Monitor account activity and review login logs for suspicious or unauthorized access attempts.
Set up alerts for unusual account activities or security incidents.
Provide security awareness training to users on best practices for using cloud services securely.
Educate users about the risks of phishing attacks, malware, and other cybersecurity threats targeting cloud users.</p>
                    <!-- <a href="#" class="visit-course">Visit Course Page</a> -->
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