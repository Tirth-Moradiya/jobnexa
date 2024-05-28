<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include_once "../Connection/db_conn.php";

    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if admin exists
    $query = "SELECT * FROM admin WHERE admin_name = '$username' AND admin_password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Admin exists, redirect to dashboard
        $_SESSION['username'] = $username;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // Admin does not exist, redirect back to login page with error
        $error = "Invalid username or password. Please try again.";
        header("Location: index.php?error=invalid");
        exit;
    }
} else {
    // If not a POST request, redirect back to login page
    header("Location: index.php");
    exit;
}
?>