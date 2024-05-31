<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/search_job.css
    ">
</head>

<body>
    <section class="search-job">
        <div class="container-job">
            <h2 class="section-title">Search Jobs</h2>
            <form class="job-search-form" id="job-search-form" method="POST" action="">
                <div class="form-group">
                    <input type="text" name="keywords" placeholder="Enter keywords, job title, or company name"
                        required>
                </div>
                <div class="form-group">
                    <input type="text" name="location" placeholder="Location" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
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

        // Display results in a popup
        echo "<div class='popup' id='popup' style='display: block;'>";
        if (count($jobs) > 0) {
            echo "<h3>Job Results</h3><div><ul>";
            foreach ($jobs as $job) {
                echo "<li>{$job['jtitle']} at {$job['company_name']} ({$job['jlocation']})</li>";
            }
            echo "</ul></div>";
        } else {
            echo "<h3>No Results</h3><div>No jobs found matching your criteria.</div>";
        }
        echo "<button onclick='closePopup()'>Close</button></div>";
    }
    ?>

    <script>
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</body>

</html>