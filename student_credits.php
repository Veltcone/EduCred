<?php
    include('partials/connection.php');

    if($_POST['type'] == ""){
        $result = mysqli_query($conn,"SELECT credits FROM credits WHERE registration_id='{$_POST['id']}'");
        $row = mysqli_fetch_array($result);
        $old_credits = $row['credits'];
        $new_credits = $old_credits + $_POST['value'];
        $result = mysqli_query($conn,"UPDATE credits SET credits = '$new_credits' WHERE registration_id = '{$_POST['id']}'");

        $result1 = mysqli_query($conn,"DELETE FROM attendance WHERE registration_id = '{$_POST['id']}'");
        $result2 = mysqli_query($conn,"DELETE FROM extrascore WHERE registration_id = '{$_POST['id']}'");
        $result2 = mysqli_query($conn,"DELETE FROM score WHERE registration_id = '{$_POST['id']}'");
    }
    
?>