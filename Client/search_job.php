<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .job-result-card {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            background-color: #fff;
        }

        .job-result-card .buttons {
            margin-top: 1rem;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body class="bg-white font-serif">
    <section class="py-16 bg-gray-50 text-blue-900 bg-gradient-to-r from-blue-50 to-indigo-100">
        <div class="max-w-full mx-auto text-center font-serif pb-10">
            <form class="bg-white mb-5 rounded-lg shadow-md p-6 mx-auto w-4/6 space-y-4" id="job-search-form"
                method="POST" action="">
                <div class="flex">
                    <div class="ml-3 w-96">
                        <input type="text" name="keywords" placeholder="Enter keywords, job title, or company name"
                            class="w-full px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="w-96">
                        <input type="text" name="location" placeholder="Location"
                            class="w-full px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="text-center mr-5 ml-auto w-32">
                        <button type="submit"
                            class="w-full bg-blue-700 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <section class="max-w-full mx-auto text-center font-serif" id="job-results-section" style="display: none;">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Database connection parameters
                include ("./Connection/db_conn.php");

                // Get form data
                $keywords = $_POST['keywords'];
                $location = $_POST['location'];

                // Define the query to search for jobs
                $query = "SELECT * FROM job WHERE (jtitle LIKE ? OR company_name LIKE ?) AND jlocation LIKE ?";
                $stmt = $conn->prepare($query);
                $searchKeywords = "%" . $keywords . "%";
                $searchLocation = "%" . $location . "%";
                $stmt->bind_param("sss", $searchKeywords, $searchKeywords, $searchLocation);
                $stmt->execute();
                $result = $stmt->get_result();

                $jobs = [];
                while ($row = $result->fetch_assoc()) {
                    $jobs[] = $row;
                }

                // Close connection
                $conn->close();

                if (count($jobs) > 0) {
                    echo "<div class='bg-white rounded-lg shadow-md p-6 mx-auto w-4/6'>";
                    echo "<h3 class='text-2xl font-semibold mb-4'>Job Results</h3><ul class='space-y-4'>";
                    foreach ($jobs as $job) {
                        echo "<li class='job-result-card'>";
                        echo "<span class='font-semibold text-lg'>{$job['jtitle']}</span> at <span class='text-blue-500'>{$job['company_name']}</span> ({$job['jlocation']})";
                        echo "<div class='buttons'>";

                        // Assuming you have a way to determine the user type
                        if ($user_type === "employer") {
                            // Display edit and delete buttons for employer
                            echo "<a href='./Client/edit_job.php?job_id={$job['jid']}' class='bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 mr-2'>Edit</a>";
                            echo "<a href='./Client/delete_job.php?job_id={$job['jid']}' class='bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 mr-2'>Delete</a>";
                        } else {
                            // Display apply and cancel buttons for user
                            echo "<a href='./Client/job_application_form.php?jid={$job['jid']}' class='apply-btn no-underline bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 mr-2'>Apply</a>";
                            echo "<button class='cancel-btn bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600'>Cancel</button>";
                        }

                        echo "</div>";
                        echo "</li>";
                    }
                    echo "</ul></div>";
                } else {
                    echo "<div class='bg-white rounded-lg shadow-md p-6 mx-auto w-4/6'>";
                    echo "<h3 class='text-2xl font-semibold mb-4'>No Results</h3><p>No jobs found matching your criteria.</p></div>";
                }
            }
            ?>
        </section>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var cancelButtons = document.querySelectorAll('.cancel-btn');

            cancelButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    var jobCard = this.closest('.job-result-card');
                    jobCard.classList.add('hidden');
                });
            });

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                document.getElementById('job-results-section').style.display = 'block';
            <?php } ?>
        });
    </script>
</body>

</html>