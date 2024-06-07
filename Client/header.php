<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="">
    <header class="bg-blue-900 w-full text-white p-3 h-20 font-serif fixed">
        <div class="flex justify-between mt-2">
            <div class="logo text-2xl ml-28 font-bold text-left">
                <a href="index.php" class="text-gray-50 no-underline">JobNexa</a>
            </div>
            <nav class="main-nav pt-1">
                <ul class="flex space-x-4">
                    <div class="flex text-lg gap-3">
                        <li><a href="../index.php" class="text-white no-underline hover:text-white">Home</a></li>
                        <li><a href="./Client/about.php" class="text-white no-underline hover:text-white">About
                                Us</a>
                        <li><a href="#" class="text-white no-underline hover:text-white">Blog</a></li>
                    </div>

                    <div class="flex gap-3 pr-20 text-lg ">
                        <?php if (!empty($logged_in_user)): ?>
                            <?php if ($user_type === "user"): ?>
                                <li><a href="./Client/application.php"
                                        class="text-white no-underline hover:text-white">Applications</a></li>
                            <?php elseif ($user_type === "employer"): ?>
                                <li><a href="./Client/post_job.php" class="text-white no-underline hover:text-white">Post
                                        Job</a>
                                </li>
                                <li><a href="./Client/manage_applications.php"
                                        class="text-white no-underline hover:text-white">View
                                        Applications</a></li>
                            <?php endif; ?>


                            <li>
                                <!-- <span class="text-white"><?php echo $welcome_message; ?></span> -->
                                <a href="./Client/logout.php"
                                    class="text-white no-underline bg-red-500 p-2 rounded hover:text-white">Logout</a>
                            </li>
                        <?php else: ?>
                            <li><a href="./Client/login1.php"
                                    class="text-blue-500 no-underline rounded p-2  bg-white  hover:bg-black">Login</a>
                            </li>
                        <?php endif; ?>

                        <?php if (empty($logged_in_user)): ?>
                            <li><a href="./Client/ex.php"
                                    class="text-white no-underline bg-blue-500 rounded p-2 hover:text-white">Sign Up</a>
                            </li>
                        <?php endif; ?>

                    </div>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>