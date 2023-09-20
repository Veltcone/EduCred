<?php  
    include('partials/connection.php');
    session_start();
    if(!isset($_SESSION['loggedin']) || ($_SESSION['loggedin']) != true){
        header('location: login.php');
        exit;
    } 
    $username = $_SESSION['username'];
    $result1 = mysqli_query($conn,"SELECT * FROM student WHERE name='$username';");
    while($row=$result1->fetch_assoc()){
        $regno = $row['registration_id']; 
        $semid = $row['semester_id']; 
    }
    // echo $regno;
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coins</title>
    <link rel="stylesheet" href="styles/styles_student_coin.css">
    <link rel="stylesheet" href="styles/styles_insert_student_coin.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
        integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
</head>

<body>
    <?php include('partials/student_navbar.php'); ?>
    <div class="home-section" style="padding-bottom: 1vh;">

        <div class="head-title">
            <h1>Student Attendence</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#"></a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Coins</a>
                </li>
            </ul>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <p>Total Present hours</p>
                    <h3 id="present"></h3>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <p>Extracurricular Points</p>
                    <h3 id="extracurricular"></h3>
                </span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle'></i>
                <span class="text">
                    <p>Interaction points</p>
                    <h3 id="interaction"></h3>
                </span>
            </li>
        </ul>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Grade Points of Student</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Surprise Test</th>
                            <th>Cycle Test</th>
                            <th>Model Test</th>
                            <th>Semester Exam</th>
                        </tr>
                    </thead>
                    <tbody id="table"> </tbody>
                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Convert to VIRTUAL COINS</h3>
                    <i class='bx bx-plus'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <div class="credits">
                    <h4>Your Performance amount's to:</h4>
                    <img src="image/virtual coins.png" alt="">
                    <h5 id="coins" name="coins"></h5>
                    <div class="">
                        <button id="btn-convert">CONVERT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pop-up">
        <div class="loader">
            <div class="lds-facebook">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <script>
        // Generate a JavaScript variable with the value of $regno
        var registration_id = <?php echo json_encode($regno); ?>;
        var semester_id = <?php echo json_encode($semid); ?>;
    </script>

    <script src="js/script_student_coin.js"></script>
    <script src="js/script_navbar.js"></script>
</body>

</html>