<?php 
    include('partials/connection.php');
    $registration_id = $_GET['registration_id'];
    $semester_id = $_GET['semester_id'];
    $data = array();

    $result = mysqli_query($conn,"SELECT COUNT(is_present) AS count_result FROM attendance WHERE is_present = '1' AND registration_id='$registration_id';");
    while ($row = mysqli_fetch_object($result))
    {
        $data[]=$row;
    }

    $result2 = mysqli_query($conn,"SELECT score AS curricular_score FROM `extrascore` WHERE registration_id='$registration_id' AND extrapoints_id='1'");
    if (mysqli_num_rows($result2) > 0) {
        while ($row = mysqli_fetch_object($result2)) {
            $data[] = $row;
        }
    }
    else {
        $data[] = (object) array("curricular_score" => 0);
    }

    $result3 = mysqli_query($conn,"SELECT score AS interaction_score FROM `extrascore` WHERE registration_id='$registration_id' AND extrapoints_id='2'");
    if (mysqli_num_rows($result3) > 0) {
        while ($row = mysqli_fetch_object($result3)) {
            $data[] = $row;
        }
    }
    else {
        $data[] = (object) array("interaction_score" => 0);
    }
    
    $result4 = mysqli_query($conn,"SELECT name FROM `subject` WHERE semester_id='$semester_id'");
    while ($row = mysqli_fetch_object($result4))
    {
        $data[]=$row;
    }


    $a = array();
    $result8 = mysqli_query($conn,"SELECT subject_id FROM `subject` WHERE semester_id='$semester_id';");
    while ($row = mysqli_fetch_assoc($result8))
    {
        $a[] = $row['subject_id'];
    }

    for($i=0;$i<3;$i++){
        for($j=1;$j<=4;$j++){
            $result9 = mysqli_query($conn,"SELECT score FROM `score` WHERE subject_id='$a[$i]' AND registration_id='$registration_id' AND testexam_id='$j';");
 
            if (mysqli_num_rows($result9) > 0) {
                while ($row = mysqli_fetch_object($result9)) {
                    $data[] = $row;
                }
            }
            else {
                $data[] = (object) array("score" => 0);
            }
        }
    }

    echo json_encode($data);
?>