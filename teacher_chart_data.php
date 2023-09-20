<?php 
    include('partials/connection.php');
    $course_id = $_GET['course_id'];
    $semester_id = $_GET['semester_id'];
    $sql= mysqli_query($conn,"SELECT * FROM credits WHERE course_id='$course_id' AND semester_id='$semester_id'");
    $data = array();
    while ($row = mysqli_fetch_object($sql))
    {
        $data[]=$row;
    }
    echo json_encode($data);
?>