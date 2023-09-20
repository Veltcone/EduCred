<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']) != true){
        header('location: login.php');
        exit;
    } 
    include('partials/connection.php');
    $username = $_SESSION['username'];

    $result1 = mysqli_query($conn,"SELECT * FROM student WHERE name='$username';");
    $result2 = mysqli_query($conn,"SELECT * FROM student WHERE name='$username'");
    $result3 = mysqli_query($conn,"SELECT d.name  FROM student s JOIN department d ON s.department_id = d.department_id WHERE s.name = '$username';");
    $result4 = mysqli_query($conn,"SELECT c.name  FROM student s JOIN course c ON s.course_id = c.course_id WHERE s.name = '$username';");
    $result5= mysqli_query($conn,"SELECT se.name  FROM student s JOIN semester se ON s.semester_id = se.semester_id WHERE s.name = '$username';");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles/styles_student_profile.css">
    <link rel="stylesheet" href="styles/styles_navbar.css">
    <script type="text/javascript" src="js/jquery.js"></script>
</head>

<body>
    <?php include('partials/student_navbar.php'); ?>
    <div class="home-section" style="padding-bottom: 1vh;">
        <div class="head-title">
            <ul class="breadcrumb">
                <li>
                    <a href="#"></a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Profile</a>
                </li>
            </ul>
        </div>
        <div class="wrapper">
            <div class="left">
                <img src="image/profile.png" alt="">
                <h4><?php echo $_SESSION['username']; ?></h4>
            </div>
            <div class="right">
                <div class="info">
                    <h3>Details</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Registration No. : </h4>
                            <p><?php while($row=$result1->fetch_assoc()){    echo $row['registration_id']; $regno=$row['registration_id'];  } ?></p>
                        </div>
                        <div class="data">
                            <h4>Email ID :</h4>
                            <p> <?php while($row=$result2->fetch_assoc()){    echo $row['email_id'];  } ?></p>
                        </div>
                        <div class="data">
                            <h4>Deparment :</h4>
                            <p> <?php while($row=$result3->fetch_assoc()){    echo $row['name'];  } ?></p>
                        </div>
                        <div class="data">
                            <h4>Course :</h4>
                            <p><?php while($row=mysqli_fetch_assoc($result4)){    echo $row['name'];  } ?></p>
                        </div>
                        <div class="data">
                            <h4>Semester :</h4>
                            <p><?php while($row=$result5->fetch_assoc()){    echo $row['name'];  } ?></p>
                        </div>
                    </div>
                </div>

                <div class="social_media">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>

                <div class="credits">
                    <div class="box">
                        <h4>Credits:</h4>
                        <div class="coins">
                            <i class="fa-solid fa-coins"></i>
                            <?php 
                                $result = mysqli_query($conn,"SELECT credits FROM credits WHERE registration_id='$regno'");
                                while($row=mysqli_fetch_assoc($result)){ 
                            ?>
                            <h5><?php echo $row['credits'] ?></h5>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/script_attendance.js"></script>
        <script src="js/script_navbar.js"></script>
    </div>
</body>

</html>