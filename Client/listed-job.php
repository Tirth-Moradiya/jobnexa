<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="stylesheet" href="./css/list_job.css">

</head>
<body>
    <div class="container-list-job">
        <h2 class="section-title">Jobs</h2>
            
            <div class="job-postings">
                <div class="job-posting">
                                <?php
    // Include database connection file
    include "./Connection/db_conn.php";

    // Fetch job postings from the database
    $query = "SELECT * FROM job";
    $result = $conn->query($query);

    // Check if there are any job postings
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="job-posting">';
            echo '<h3>' . $row["jtitle"] . '</h3>';
            echo '<p>Company: ' . $row["company_name"] . '</p>';
            echo '<p>Location: ' . $row["jlocation"] . '</p>';
            echo '<p>Description: ' . $row["jdescription"] . '</p>';
            echo '<p>Salary: $' . $row["jsalary"] . '</p>';
            echo '<button class="apply-btn">Apply</button>';
            echo '</div>';
        }
    } else {
        echo "No job postings found.";
    }

    // Close database connection
    $conn->close();
    ?>
        
                </div>
            
                <!-- Add more job postings as needed -->
                <div class="bm">
                <button>Browse More</button>
    </div>
            </div>
    </div>

</body>
</html>