<?php
session_start(); // Start the session

include "../Connection/db_conn.php";

// Fetch categories
$categories_result = $conn->query("SELECT cat_id, cat_name FROM category");

// Fetch all jobs
$jobs_result = $conn->query("SELECT job.*, category.cat_name FROM job JOIN category ON job.cat_id = category.cat_id");

$categories = [];
while ($row = $categories_result->fetch_assoc()) {
    $categories[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .category-slider {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            justify-content: center;
        }

        .category-slider::-webkit-scrollbar {
            display: none;
        }

        .job-item {
            display: none;
            /* Initially hide all job items */
        }

        @media (min-width: 640px) {
            .category-slider {
                overflow-x: hidden;
            }
        }

        @media (min-width: 768px) {
            .grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .grid-cols-3 {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }
    </style>
</head>

<body class="bg-blue-50">
    <?php include "header.php"; ?>
    <div class="container mx-auto pt-10 font-serif text-blue-900">
        <h2 class="text-3xl font-semibold text-center mb-8">All Jobs </h2>

        <!-- Category Slider -->
        <div class="category-slider mx-auto mb-8 md:mb-16 w-full px-4 md:px-20 text-center">
            <button class="category-btn bg-blue-500 text-white px-4 py-2 rounded mr-2" data-category="all">All</button>
            <?php foreach ($categories as $category): ?>
                <button class="category-btn bg-blue-500 text-white px-4 py-2 rounded mr-2"
                    data-category="<?= htmlspecialchars($category['cat_id']) ?>"><?= htmlspecialchars($category['cat_name']) ?></button>
            <?php endforeach; ?>
        </div>

        <!-- Job Listings -->
        <div id="jobListings" class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 px-4 md:px-20">
            <?php while ($job = $jobs_result->fetch_assoc()): ?>
                <div class="bg-white text-left shadow rounded-md px-6 py-4 transform transition duration-500 hover:scale-105 job-item"
                    data-category="<?= htmlspecialchars($job['cat_id']) ?>">
                    <h3 class="text-xl font-semibold mb-2"><span>Role: </span><?= htmlspecialchars($job['jtitle']) ?></h3>
                    <hr />
                    <p class="text-lg tracking-wider"><i class="fas fa-building text-xl text-black"></i>
                        <?= htmlspecialchars($job['company_name']) ?></p>
                    <p class="text-lg tracking-wider"><i class="fas fa-location-arrow text-xl text-black"></i>
                        <?= htmlspecialchars($job['jlocation']) ?></p>
                    <p class="text-lg tracking-wider"><i class="fas fa-hashtag text-xl text-black"></i>
                        <?= htmlspecialchars($job['jdescription']) ?></p>
                    <p class="text-lg tracking-wider"><span class="font-semibold text-black">$</span>
                        <?= htmlspecialchars($job['jsalary']) ?></p>
                    <hr />
                    <div class="flex justify-center gap-2 mt-4">
                        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'employer'): ?>
                            <a href="./employer/edit_job.php?jid=<?= $job['jid'] ?>"
                                class="inline-block bg-blue-500 text-white no-underline px-4 py-2 rounded-md hover:bg-blue-600">Update</a>
                            <a href="./employer/delete_job.php?jid=<?= $job['jid'] ?>"
                                class="inline-block bg-red-500 text-white no-underline px-4 py-2 rounded-md hover:bg-red-600">Delete</a>
                        <?php elseif (isset($_SESSION['user_type'])): ?>
                            <a href="./user/job_application_form.php?jid=<?= $job['jid'] ?>"
                                class="inline-block bg-green-500 text-white px-4 py-2 no-underline rounded-md hover:bg-green-600">Apply</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const categoryButtons = document.querySelectorAll('.category-btn');
            const jobItems = document.querySelectorAll('.job-item');

            categoryButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const category = button.getAttribute('data-category');

                    jobItems.forEach(item => {
                        if (category === 'all' || item.getAttribute('data-category') === category) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>

</html>