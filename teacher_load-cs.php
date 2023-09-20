<?php
    include('partials/connection.php');

    if($_POST['type'] == ""){
        $sql = "SELECT * FROM course";
        $query = mysqli_query($conn,$sql);
        
        $str = "";
        while($row=mysqli_fetch_assoc($query)){ 
            $str .= "<option value='{$row['course_id']}'>{$row['name']}</option>";
        }
    }
    else if($_POST['type'] == "semesterdata"){
        $sql = "SELECT * FROM semester"; // value from test.php
        $query = mysqli_query($conn,$sql);
        
        $str = "<option value=''>...</option>";
        while($row=mysqli_fetch_assoc($query)){ 
            $str .= "<option value='{$row['semester_id']}'>{$row['name']}</option>";
        }

    }
    else if($_POST['type'] == "subjectdata"){
        $sql = "SELECT * FROM subject WHERE semester_id = {$_POST['id']} AND course_id={$_POST['cid']}"; // value from test.php
        $query = mysqli_query($conn,$sql);
        
        $str = "";
        while($row=mysqli_fetch_assoc($query)){ 
            $str .= "<option value='{$row['subject_id']}'>{$row['name']}</option>";
        }
    }
    echo $str;
?>