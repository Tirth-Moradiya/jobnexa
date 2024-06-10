<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="mx-auto px-4 py-10 font-serif text-blue-900">
        <h2 class="text-3xl font-semibold text-center mb-8">Latest job opportunities</h2>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 px-20">
            <?php
            include "./Connection/db_conn.php";

            $query = "SELECT * FROM job ORDER BY RAND() LIMIT 6";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="bg-white text-left shadow rounded-md px-10 py-5  transform transition duration-500 hover:scale-105">';
                    echo '<div class="flex justify-between items-center mb-2">';
                    echo '<h3 class="text-xl font-semibold">' . htmlspecialchars($row["jtitle"]) . '</h3>';
                    echo '<span class="bg-blue-500 text-white text-sm px-2 py-1 rounded-full">' . htmlspecialchars($row["jtype"]) . '</span>'; // Job type display
                    echo '</div>';
                    echo '<hr/>';
                    echo '<p class="text-lg tracking-wider"><i class="fas fa-building text-xl text-black"></i> ' . $row["company_name"] . '</p>';
                    echo '<p class="text-lg tracking-wider"><i class="fas fa-location-arrow text-xl text-black"></i> ' . $row["jlocation"] . '</p>';
                    echo '<p class="text-lg tracking-wider"><i class="fas fa-hashtag text-xl text-black"></i> ' . $row["jdescription"] . '</p>';
                    echo '<p class="text-lg tracking-wider"><span class="font-semibold text-black">$</span> ' . $row["jsalary"] . '</p><hr/>';
                    echo '<div class="flex justify-center gap-2 mt-4">';
                    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'employer') {
                        echo '<a href=".../../Client/edit_job.php?jid=' . $row["jid"] . '" class="inline-block bg-blue-500 text-white no-underline px-4 py-2 rounded-md hover:bg-blue-600">Update</a>';
                        echo '<a href=".../../Client/delete_job.php?jid=' . $row["jid"] . '" class="inline-block bg-red-500 text-white no-underline px-4 py-2 rounded-md hover:bg-red-600">Delete</a>';
                    }
                    if (isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'employer') {
                        echo '<a href=".../../Client/job_application_form.php?jid=' . $row["jid"] . '" class="inline-block bg-green-500 text-white px-4 py-2 no-underline rounded-md hover:bg-green-600">Apply</a>';
                    }
                    echo '</div>'; // Closing flex div
                    echo '</div>'; // Closing job-posting card
                }
            } else {
                echo '<p class="text-center">No job postings found.</p>';
            }
            $conn->close();
            ?>
        </div>

        <div class="text-center mt-8">
            <a href="./Client/all_jobs.php"
                class="px-6 py-3 no-underline bg-blue-700 text-white rounded-lg hover:bg-blue-600">Browse
                More</a>
        </div>
    </div>
</body>

</html>