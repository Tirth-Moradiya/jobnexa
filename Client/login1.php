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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>


<body class="bg-blue-50 h-screen flex items-center justify-center font-serif">
    <div class="container flex gap-52 justify-center items-center h-full">
        <div class="left-side w-fit flex-1 p-8 text-center">
            <h1 class="text-4xl font-bold text-blue-900 mb-4">Welcome to JobNexa</h1>
            <p class="text-xl text-gray-700">Find the best job opportunities!</p>
        </div>
        <div class="w-full lg:w-1/2  max-w-md p-8 bg-white rounded-lg shadow-lg mx-auto lg:mr-10">
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









<!-- body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.left-side {
    flex: 1;
    padding: 20px;
    text-align: center;
}


.right-side {
    flex: 0.5;
    margin-right: 200px;
    width: 500px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.title {
    color: black;
}

.subtitle {
    color: #555;
}

.header {
    background-color: black;
    color: #fff;
    padding: 20px;
    text-align: center;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    margin-top: 0;
}

.form {
    padding: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group input[type="text"],
.form-group input[type="password"],
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    outline: none;
}

.form-group select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-repeat: no-repeat;
    background-position: right 10px top 50%;
    background-size: 12px auto;
}

.btn {
    width: 100%;
    padding: 12px;
    background-color: black;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: gray;
}

/* Your existing CSS styles here */

.form-links-fp , .form-links-signup {
    text-align: center;
    justify-content: space-between;
    margin-top: 10px;
}

.form-links-fp  a {
    color: #007bff;
    text-decoration: none;
}

.form-links-signup  a {
    color: #007bff;
    text-decoration: none;
}

.form-links-fp a:hover {
    text-decoration: underline;
}

.form-links-signup a:hover {
    text-decoration: underline;
} -->