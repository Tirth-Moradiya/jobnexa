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
    <style>
        /* Additional styles */
        .mobile-menu {
            display: none;
        }

        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
            }

            .main-nav {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-100">

    <header class="bg-blue-900 text-white px-4 py-3 md:py-4 font-serif w">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="logo text-2xl font-bold ml-20">
                <a href="index.php" class="text-gray-50 no-underline">JobNexa</a>
            </div>

            <!-- Navigation -->
            <nav class="main-nav hidden md:block">
                <ul class="flex space-x-4 my-auto">
                    <li><a href="../index.php" class="text-white no-underline hover:text-gray-200">Home</a></li>
                    <li><a href="./Client/about.php" class="text-white no-underline hover:text-gray-200">About Us</a>
                    </li>
                    <li><a href="#" class="text-white no-underline hover:text-gray-200">Blog</a></li>

                    <?php if (!empty($logged_in_user)): ?>
                        <?php if ($user_type === "user"): ?>
                            <li><a href="./Client/user/application.php"
                                    class="text-white no-underline hover:text-gray-200">Applications</a></li>
                            <li><a href="./Client/all_jobs.php" class="text-white no-underline hover:text-gray-200">Jobs</a>
                            </li>
                            <li><a href="./Client/profile.php" class="text-white no-underline hover:text-gray-200">Profile</a>
                            </li>
                        <?php elseif ($user_type === "employer"): ?>
                            <li><a href="./Client/employer/job_post_form.php"
                                    class="text-white no-underline hover:text-gray-200">Post Job</a></li>
                            <li><a href="./Client/employer/manage_applications.php"
                                    class="text-white no-underline hover:text-gray-200">View Applications</a></li>
                            <li><a href="./Client/profile.php" class="text-white no-underline hover:text-gray-200">Profile</a>
                            </li>
                        <?php endif; ?>
                        <li><a href="./Client/logout.php"
                                class="text-white no-underline bg-red-500 px-3 py-2 rounded-md hover:bg-red-600 transition duration-300">Logout</a>
                        </li>
                    <?php else: ?>
                        <li><a href="./Client/login1.php"
                                class="text-blue-500 no-underline rounded px-3 py-2 bg-white hover:bg-black transition duration-300">Login</a>
                        </li>
                        <li><a href="./Client/signup.php"
                                class="text-white no-underline bg-blue-500 px-3 py-2 rounded-md hover:bg-blue-600 transition duration-300">Sign
                                Up</a></li>
                    <?php endif; ?>
                </ul>
            </nav>

            <!-- Mobile Menu (Hamburger Icon) -->
            <div class="md:hidden mobile-menu">
                <button id="mobile-menu-toggle" onclick="toggleMobileMenu()"
                    class="text-white focus:outline-none focus:text-gray-200">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu (Hidden by Default) -->
    <div id="mobile-menu" class="md:hidden hidden bg-blue-900 text-white px-4 py-2">
        <ul class="space-y-2">
            <li><a href="../index.php" class="text-white no-underline hover:text-gray-200">Home</a></li>
            <li><a href="why_jobnexa.php#why-choose-us" class="text-white no-underline hover:text-gray-200">About us</a>
            </li>
            <li><a href="#" class="text-white no-underline hover:text-gray-200">Blog</a></li>

            <?php if (!empty($logged_in_user)): ?>
                <?php if ($user_type === "user"): ?>
                    <li><a href="./Client/user/application.php"
                            class="text-white no-underline hover:text-gray-200">Applications</a></li>
                    <li><a href="./Client/all_jobs.php" class="text-white no-underline hover:text-gray-200">Jobs</a></li>
                    <li><a href="./Client/profile.php" class="text-white no-underline hover:text-gray-200">Profile</a></li>
                <?php elseif ($user_type === "employer"): ?>
                    <li><a href="./Client/employer/job_post_form.php" class="text-white no-underline hover:text-gray-200">Post
                            Job</a></li>
                    <li><a href="./Client/employer/manage_applications.php"
                            class="text-white no-underline hover:text-gray-200">View Applications</a></li>
                    <li><a href="./Client/profile.php" class="text-white no-underline hover:text-gray-200">Profile</a></li>
                <?php endif; ?>
                <li><a href="./Client/logout.php"
                        class="text-white no-underline bg-red-500 px-3 py-2 rounded-md hover:bg-red-600 transition duration-300">Logout</a>
                </li>
            <?php else: ?>
                <li><a href="./Client/login1.php"
                        class="text-blue-500 no-underline rounded px-3 py-2 bg-white hover:bg-black transition duration-300">Login</a>
                </li>
                <li><a href="./Client/signup.php"
                        class="text-white no-underline bg-blue-500 px-3 py-2 rounded-md hover:bg-blue-600 transition duration-300">Sign
                        Up</a></li>
            <?php endif; ?>
        </ul>
    </div>

    <script>
        function toggleMobileMenu() {
            var mobileMenu = document.getElementById("mobile-menu");
            mobileMenu.classList.toggle("hidden");
        }
    </script>

</body>

</html>