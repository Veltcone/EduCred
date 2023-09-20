<?php include('partials/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Score</title>
    <link rel="stylesheet" href="styles/styles_attendance.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
    <?php include('partials/teacher_navbar.php'); ?>

    <div class="home-section" style="padding-bottom: 1vh;">
        <div class="head-title">
            <h1>Exam & Test Marks</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#"></a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Marks</a>
                </li>
            </ul>
        </div>

        <form action="#" method="POST">
            <div class="title">Student Score</div>
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
                <div class="box">
                    <p>Select Subject </p>
                    <div class="select-container">
                        <select name="subject" id="subject" class="select-box">
                            <option value="">Select Subject</option>
                        </select>
                        <div class="icon-container">
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <p>Select Test/Exam </p>
                    <div class="select-container">
                        <select name="testexam" id="score" class="select-box">
                            <option value="1">Surprise Test</option>
                            <option value="2">Cycle Test</option>
                            <option value="3">Modal Test</option>
                            <option value="4">Semester Exam</option>
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
                <p>Enter the Marks obtained by the students.</p>
                <table>
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Registration No.</th>
                            <th>Marks</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            if(isset($_POST['submit'])){
                                $course = $_POST['course'];
                                $semester = $_POST['semester'];
                                $subject = $_POST['subject'];
                                $j = 0;
                                $testexam = $_POST['testexam'];
        
                                $query="SELECT * FROM `student` WHERE course_id='$course' AND semester_id='$semester'";
                                $result=mysqli_query($conn,$query);
                                while($row=mysqli_fetch_array($result)){
                        ?>

                        <tr>
                            <input type="hidden" name="sl_no" value="<?php echo $j++; ?>">
                            <input type="hidden" name="registration_id[]"
                                value="<?php echo $row['registration_id']; ?>">
                            <input type="hidden" name="testexam" value="<?php echo $testexam; ?>">
                            <input type="hidden" name="course" value="<?php echo $course; ?>">
                            <input type="hidden" name="semester" value="<?php echo $semester; ?>">
                            <input type="hidden" name="subject" value="<?php echo $subject; ?>">

                            <td><?php echo $j; ?></td>
                            <td><?php echo $row['registration_id'] ?></td>

                            <?php if($testexam == 1){?>
                            <td><input type="VARCHAR" name="score[]" pattern="[1-5]{1}" required></td>
                            <?php }elseif($testexam == 2){ ?>
                            <td><input type="VARCHAR" name="score[]" pattern="[1-4]?[0-9]|50" required></td>
                            <?php }else{?>
                            <td><input type="VARCHAR" name="score[]" pattern="[1-9]?[0-9]|100" required></td>
                            <?php } ?>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>
                <div class="table-btn">
                    <button type="submit" name="insert_score">Update</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/script_teacher.js"></script>
</body>

</html>