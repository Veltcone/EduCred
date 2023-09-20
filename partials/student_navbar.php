<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav-Bar</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="styles/styles_topbar.css"> -->
    <link rel="stylesheet" href="styles/styles_navbar.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo_details">
            <i class="bx bxl-audible icon"></i>
            <div class="logo_name">EduCred</div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
            <!-- <li>
                    <a href="#">
                        <i class="bx bx-grid-alt"></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                    <span class="tooltip">Dashboard</span>
                </li> -->
            <li>
                <a href="student_profile.php">
                    <i class="bx bx-user"></i>
                    <span class="link_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <!-- <li>
                    <a href="attendance.php">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span class="link_name">Attendance</span>
                    </a>
                    <span class="tooltip">Attendance</span>
                </li> -->

            <li>
                <a href="student_coin.php">
                    <i class="fa-solid fa-coins"></i>
                    <span class="link_name">Coins</span>
                </a>
                <span class="tooltip">Coins</span>
            </li>
            <li>
                <a href="student_shopping.php">
                    <i class="bx bx-cart-alt"></i>
                    <span class="link_name">Rewards</span>
                </a>
                <span class="tooltip">Rewards</span>
            </li>
            <!-- <li>
                <a href="">
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="link_name">Performance</span>
                </a>
                <span class="tooltip">Performance</span>
            </li> -->
            <!-- <li>
                    <a href="#">
                        <i class="bx bx-folder"></i>
                        <span class="link_name">File Manger</span>
                    </a>
                    <span class="tooltip">File Manger</span>
                </li> -->

            <li>
                <a href="logout.php">
                    <i class="bx bx-log-out" id="log_out"></i>
                    <span class="link_name">Logout</span>
                </a>
                <span class="tooltip">Logout</span>
            </li>
            <!-- <li>
                    <a href="#">
                        <i class="bx bx-cog"></i>
                        <span class="link_name">Settings</span>
                    </a>
                    <span class="tooltip">Settings</span>
                </li> -->
            <!-- <li class="profile">
                <div class="profile_details">
                    <img src="image\profile.jpeg" alt="profile image">
                    <div class="profile_content">
                        <div class="name">Anna Jhon</div>
                        <div class="designation">Admin</div>
                    </div>
                </div>
                <i class="bx bx-log-out" id="log_out"></i>
            </li> -->
        </ul>
    </div>

    <!-- <div class="topbar">
            <ul class="nav-list">
                <li>
                    <i class="bx bx-search"></i>
                    <input type="text" placeholder="Search...">
                </li>
            </ul>
        </div> -->

    <script src="js/script_navbar.js"></script>
</body>

</html>