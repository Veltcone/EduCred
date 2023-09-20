<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
    <link rel="stylesheet" href="styles/styles_teacher_chart.css">
    <link rel="stylesheet" href="styles/styles_attendance.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
    <?php include('partials/teacher_navbar.php'); ?>
    <div class="home-section" style="padding-bottom: 2vh;">
        <div class="head-title">
            <h1>Class Credits</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#"></a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Performance</a>
                </li>
            </ul>
        </div>
        <div class="select">
            <div class="container">
                <div class="box">
                    <p>Select Course</p>
                    <div class="select-container">
                        <select name="course" id="course" class="select-box">
                            <option value="">Select Course</option>
                        </select>
                        <div class="icon-container">
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <p>Select Semester</p>
                    <div class="select-container">
                        <select name="semester" id="semester" class="select-box">
                            <option value="">Select Semester</option>
                        </select>
                        <div class="icon-container">
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <div class="form-btn">
                    <button id="show">Save</button>
                </div>
                <div class="chart">
                    <canvas id="bar-chart" width="300" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.3/dist/chart.umd.min.js"></script>
    <script src="js/script_teacher_chart.js"></script>
</body>

</html>