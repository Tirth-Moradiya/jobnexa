<?php
include "../Connection/db_conn.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
        echo "Redirecting to index.php"; // This should be printed if the redirection is reached
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