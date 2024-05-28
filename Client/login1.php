<?php
include "../Connection/db_conn.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error message
$error_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user_type = $_POST["user_type"];

    // Prepare SQL statement based on user type
    if ($user_type === "user") {
        $stmt = $conn->prepare("SELECT * FROM user WHERE uname = ? AND upassword = ?");
    } elseif ($user_type === "employer") {
        $stmt = $conn->prepare("SELECT * FROM employer WHERE ename = ? AND epassword = ?");
    } else {
        // Invalid user type
        die("Invalid user type");
    }

    // Bind parameters and execute SQL statement
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // User exists, start session
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["user_type"] = $user_type;
        header("Location: ../index.php"); // Redirect to index page (login page)
        exit();
    } else {
        // User does not exist or invalid credentials
        $error_message = "Invalid username or password";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

    <div class="container">
        <div class="left-side">
            <h1 class="title">Welcome to JobNexa</h1>
            <p class="subtitle">Find the best job opportunities!</p>
            <!-- You can add your company logo or image here -->
        </div>
        <div class="right-side">
            <h2 class="header">Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <select id="user_type" name="user_type" required>
                        <option value="" disabled selected>Login As</option>
                        <option value="user">User</option>
                        <option value="employer">Employer</option>
                    </select>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <div class="error-message" style="color: red;"><?php echo $error_message; ?></div>
            <div class="form-links-fp">
                <a href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="form-links-signup">
                <span>Don't have an account? <a href="ex.php">Sign Up Here</a></span> <br>
            </div>
        </div>
    </div>
</body>

</html>