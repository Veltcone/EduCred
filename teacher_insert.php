<?php
    include('partials/connection.php');  
    if(isset($_POST['submit'])){
        $slno = $_POST['sl_no'];
        $registration_id = $_POST['registration_id'];
        $subject_id = $_POST['subject_id'];
        $current_date = date('Y-m-d');
        $is_present = $_POST['is_present'];

        for($i=0;$i<=$slno;$i++){
            if($is_present[$i] == 0 ){
                $points = 0;
            }
            else{
                $points = 1;
            }
            $query = "INSERT INTO `attendance` (`registration_id`, `subject_id`, `attendance_date`,`is_present`) VALUES ('$registration_id[$i]','$subject_id','$current_date','$points');";
            $run=mysqli_query($conn,$query);
        }
    }
    
    if(isset($_POST['insert_score'])){
        $slno = $_POST['sl_no'];
        $registration_id = $_POST['registration_id']; //array
        $testexam = $_POST['testexam'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];
        $subject = $_POST['subject'];
        $score = $_POST['score']; //array

        for($i=0;$i<=$slno;$i++){
            if($testexam != 1){
                $a[$i] = $score[$i]/5;
                $points[$i] = (int)$a[$i];
                $query = "INSERT INTO `score` (`registration_id`, `testexam_id`, `course_id`, `semester_id`, `subject_id`, `score`) VALUES ('$registration_id[$i]', '$testexam', '$course', '$semester', '$subject', '$points[$i]')";
            }
            else{
                $query = "INSERT INTO `score` (`registration_id`, `testexam_id`, `course_id`, `semester_id`, `subject_id`, `score`) VALUES ('$registration_id[$i]', '$testexam', '$course', '$semester', '$subject', '$score[$i]')";
            }
            $run=mysqli_query($conn,$query);
        }
    }

    if(isset($_POST['insert_extra_score'])){
        $slno = $_POST['sl_no'];
        $registration_id = $_POST['registration_id']; //array
        $extrapoints = $_POST['extrapoints'];
        $course = $_POST['course'];
        $semester = $_POST['semester'];
        $score = $_POST['score']; //array

        for($i=0;$i<=$slno;$i++){
            $query = "INSERT INTO `extrascore` (`registration_id`, `extrapoints_id`, `course_id`, `semester_id`, `score`) VALUES ('$registration_id[$i]', '$extrapoints', '$course', '$semester', '$score[$i]')";
            $run=mysqli_query($conn,$query);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
    <link rel="stylesheet" href="styles/styles_insert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
</head>

<body>
    <div class="container">
        <div class="pop-up">
            <img src="image/404-tick.png" alt="">
            <div class="text">
                <p>Success!</p>
                <p>Updated Successfully</p>
                <P>Thank you for using</P>
            </div>
        </div>

        <div class="loader">
            <div class="lds-facebook">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <script src="js/script_insert.js"></script>
</body>

</html>