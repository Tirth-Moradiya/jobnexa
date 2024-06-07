<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="mx-auto px-4 py-10 font-serif text-blue-900">
        <h2 class="text-3xl font-semibold text-center mb-8">Popular Jobs</h2>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 px-20">
            <?php
            include "./Connection/db_conn.php";

            $query = "SELECT * FROM job";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="bg-white shadow rounded-md p-6 text-center transform transition duration-500 hover:scale-105">';
                    echo '<h3 class="text-xl font-semibold mb-2">' . $row["jtitle"] . '</h3><hr/>';
                    echo '<p><span class="font-semibold text-black">Company:</span> ' . $row["company_name"] . '</p>';
                    echo '<p><span class="font-semibold text-black">Location:</span> ' . $row["jlocation"] . '</p>';
                    echo '<p><span class="font-semibold text-black">Description:</span> ' . $row["jdescription"] . '</p>';
                    echo '<p><span class="font-semibold text-black">Salary:</span> $' . $row["jsalary"] . '</p><hr/>';
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
            <button class="px-6 py-3 bg-blue-700 text-white rounded-lg hover:bg-blue-600">Browse More</button>
        </div>
    </div>
</body>

</html>