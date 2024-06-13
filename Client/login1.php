<?php
// Start session
session_start();

include "../Connection/db_conn.php"; // Make sure to create and configure your database connection here


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user_type = $_POST["user_type"];

    // Prepare SQL statement based on user type
    if ($user_type === "user") {
        $stmt = $conn->prepare("SELECT uid FROM user WHERE uname = ? AND upassword = ?");
    } elseif ($user_type === "employer") {
        $stmt = $conn->prepare("SELECT eid FROM employer WHERE ename = ? AND epassword = ?");
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
        $_SESSION["username"] = $username;
        $_SESSION["user_type"] = $user_type;

        // Fetch and store eid/uid based on user type
        $row = $result->fetch_assoc();
        if ($user_type === "user") {
            $_SESSION["uid"] = $row["uid"];
        } elseif ($user_type === "employer") {
            $_SESSION["eid"] = $row["eid"];
        }

        // Redirect to index page (login page)
        header("Location: ../index.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | JobNexa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-50 min-h-screen flex flex-col justify-center items-center font-serif">
    <div class="container flex flex-col lg:flex-row gap-4 justify-center items-center max-w-screen-lg">
        <div class="left-side flex-1 p-8 text-center">
            <h1 class="text-4xl font-bold text-blue-900 mb-4">Welcome to JobNexa</h1>
            <p class="text-xl text-gray-700">Find the best job opportunities!</p>
        </div>
        <div class="mt-8 w-full lg:w-1/2 max-w-md p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-white bg-blue-900 p-4 rounded-t-lg text-center mb-4">Login</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="space-y-4">
                <div class="form-group">
                    <input type="text" id="username" name="username" placeholder="Username" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="form-group">
                    <select id="user_type" name="user_type" required
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Login As</option>
                        <option value="user">User</option>
                        <option value="employer">Employer</option>
                    </select>
                </div>
                <button type="submit"
                    class="w-full py-3 bg-blue-900 text-white rounded-lg font-semibold hover:bg-gray-700 transition duration-300">Login</button>
            </form>
            <div class="mt-4 text-center">
                <a href="forgot-password.html" class="text-blue-500 hover:underline">Forgot Password?</a>
            </div>
            <div class="mt-2 text-center">
                <span>Don't have an account? <a href="signup.php" class="text-blue-500 hover:underline">Sign Up
                        Here</a></span>
            </div>
        </div>
    </div>
</body>

</html>