<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white font-serif">
    <section class="py-16 bg-gray-50 text-blue-900 bg-gradient-to-r from-blue-50 to-indigo-100">
        <div class="max-w-full mx-auto text-center font-serif pb-10">
            <h2 class="text-3xl font-semibold mb-8">Search Jobs</h2>
            <form class="bg-white rounded-lg shadow-md p-6 mx-auto w-4/6 space-y-4" id="job-search-form" method="POST"
                action="">
                <div class=" p-2 flex">
                    <div class="ml-3 w-96">
                        <input type="text" name="keywords" placeholder="Enter keywords, job title, or company name"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="ml-5 w-96">
                        <input type="text" name="location" placeholder="Location"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="text-center ml-auto w-32">
                        <button type="submit"
                            class="w-full bg-blue-700 text-white py-2 px-4 rounded-lg hover:bg-blue-600">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

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

        // Display results in a modal
        // Display results in a modal
        echo "<div class='fixed  inset-0 flex items-center justify-center z-50' id='popup' style='display: block;'>";
        echo "<div class='bg-black bg-opacity-50 absolute inset-0'></div>"; // Dark overlay
        echo "<div class='bg-white rounded-lg shadow-lg p-6 w-full max-w-md text-center relative'>";
        if (count($jobs) > 0) {
            echo "<h3 class='text-2xl font-semibold mb-4'>Job Results</h3><ul class='list-disc list-inside'>";
            foreach ($jobs as $job) {
                echo "<li class='mb-2'><span class='font-semibold'>{$job['jtitle']}</span> at <span class='text-blue-500'>{$job['company_name']}</span> ({$job['jlocation']})</li>";
            }
            echo "</ul>";
        } else {
            echo "<h3 class='text-2xl font-semibold mb-4'>No Results</h3><p>No jobs found matching your criteria.</p>";
        }
        echo "<button class='mt-4 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600' onclick='closePopup()'>Close</button></div></div>";

    }
    ?>

    <script>
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>

</html>