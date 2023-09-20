<?php
    include('partials/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <link rel="stylesheet" href="styles/styles_attendance.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
    <?php include('partials/teacher_navbar.php'); ?>
    <div class="home-section" style="padding-bottom: 1vh;">
        <div class="head-title">
            <h1>Student Attendence</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#"></a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Attendance</a>
                </li>
            </ul>
        </div>

        <form action="#" method="POST">
            <div class="title">Student Attendance</div>
            <div class="container">
                <div class="box">
                    <p>Select Course</p>
                    <!-- <input type="text" placeholder="Select Course"> -->
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
                    <!-- <input type="text" placeholder="Select Year"> -->
                    <div class="select-container">
                        <select name="semester" id="semester" class="select-box">
                            <option value="">Select Semester</option>
                        </select>
                        <div class="icon-container">
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <p>Select Subject </p>
                    <!-- <input type="text" placeholder="Select Attendance/Marks"> -->
                    <div class="select-container">
                        <select name="subject" id="subject" class="select-box">
                            <option value="">Select Subject</option>
                        </select>
                        <div class="icon-container">
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-btn">
                <button><input type="submit" name="submit" value="Save"></button>
            </div>
        </form>

        <div class="table-box">
            <form action="teacher_insert.php" method="POST" class="form">
                <p>Enter the attendance of the students</p>
                <table>
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Registration No.</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            if(isset($_POST['submit'])){
                                $course = $_POST['course'];
                                $semester = $_POST['semester'];
                                $subject = $_POST['subject'];
                                $j = 0;
        
                                $query="SELECT * FROM `student` WHERE course_id='$course' AND semester_id='$semester'";
                                $result=mysqli_query($conn,$query);
                                while($row=mysqli_fetch_array($result)){
                        ?>

                        <tr>
                            <input type="hidden" name="sl_no" value="<?php echo $j++; ?>">

                            <td><?php echo $j; ?></td>
                            <td><?php echo $row['registration_id'] ?></td>
                            <td><input type="VARCHAR" name="is_present[]" pattern="[0-1]{1}" required></td>

                            <input type="hidden" name="registration_id[]" value="<?php echo $row['registration_id']; ?>">
                            <input type="hidden" name="subject_id" value="<?php echo $subject; ?>">
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
                <div class="table-btn">
                    <button type="submit" name="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/script_teacher.js"></script>
</body>

</html>