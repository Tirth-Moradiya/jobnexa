<?php
session_start();
$logged_in_user = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
$user_type = isset($_SESSION["user_type"]) ? $_SESSION["user_type"] : "";

// Determine the appropriate welcome message based on user type
$welcome_message = "";
if (!empty($logged_in_user)) {
    if ($user_type === "user") {
        $welcome_message = "Welcome, $logged_in_user!";
    } elseif ($user_type === "employer") {
        $welcome_message = "Employer: $logged_in_user";
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <title>Job Portal</title>
    <link rel="stylesheet" href="./css/header.css">
</head>

<body>
    <header class="site-header">
        <div class="container">
            <div class="logo">
                <a href="index.php">JobNexa</a>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="./Client/about.php">About Us</a></li>

                    <?php if (!empty($logged_in_user)): ?>
                        <?php if ($user_type === "user"): ?>
                            <li><a href="./Client/applications.php">Applications</a></li>
                        <?php elseif ($user_type === "employer"): ?>
                            <li><a href="./Client/post_job.php">Post Job</a></li>
                            <li><a href="./Client/view_applications.php">View Applications</a></li>
                        <?php endif; ?>
                        <li>
                            <span><?php echo $welcome_message; ?></span>
                            <a href="./Client/logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li><a href="./Client/login1.php">Login</a></li>
                    <?php endif; ?>

                    <?php if (empty($logged_in_user)): ?>
                        <li><a href="./Client/ex.php">Sign Up</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>