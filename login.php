<?php 
    include('partials/connection.php');
    $fail = false;
    $msg = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $type = $_POST["type"];

        // Sanitize user input to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        $type = mysqli_real_escape_string($conn, $type);

        // Query to check if the user exists in the database
        $sql = "SELECT * FROM users WHERE username = '$username'  AND user_type='$type' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row["password"];
            
            // Verify the password
            if ($password==$hashedPassword) {
                if($type=="student"){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    // $_SESSION['registration_id'] = $registration_id;
                    header("Location: student_profile.php");
                    exit();
                }
                else{
                    header("Location:teacher_attendance.php");
                }
            } else {
                $msg = "Invalid password.";
            }
        } else {
            $msg =  "User not found.";
        }
    }
    // Close the database connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#009578">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/styles_login.css" />
    <link rel="stylesheet" href="src/master.css">
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="images/logo192.png">
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="sign-in-form">
                <div class="educred">
                    <i class="fa-solid fa-coins"></i>
                    <div class="wrap">
                        <h2>EduCred:</h2>
                        <h3>Unlock your academic potential</h3>
                    </div>
                </div>
                <h4 class="title">Log in</h4>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="username" placeholder="username" name="username" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" required />
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-caret-down"></i>
                    <select name="type" id="" class="select-box">
                        <option value="">. . . . . . .</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <?php if($fail==0){echo $msg;} ?>
                <input type="submit" value="Login" class="btn solid" />
                <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
        </div>

        <div class="right-panel">
            <img src="image/rewards.png" class="image" alt="" />
        </div>
    </div>
    <script src="src/index.js"></script>
</body>
</html>