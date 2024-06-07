<?php
ob_start(); // Start output buffering
include "../Connection/db_conn.php";

// Check if the delete button is clicked
if (isset($_POST['delete_job'])) {
    $jid = $_POST['delete_job_id'];
    // Prepare and execute the SQL statement to delete the job posting
    $stmt = $conn->prepare("DELETE FROM job WHERE jid = ?");
    $stmt->bind_param("i", $jid);
    if ($stmt->execute()) {
        // Job posting deleted successfully
        header("Location: jobs.php"); // Redirect to refresh job postings
        exit();
    } else {
        // Error occurred while deleting the job posting
        echo "Error: " . $stmt->error;
    }
    // Close statement
    $stmt->close();
}

$query = "SELECT * FROM job";
$result = $conn->query($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="font-serif bg-gray-100">

    <?php include "sidebar.php"; ?>

    <div class="w-4/5 ml-72 p-4 mt-5">
        <h2 class="text-3xl font-bold mb-6">Job Postings</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='job bg-white shadow-lg rounded-lg p-6 transform transition-transform duration-200 ease-in-out'>";
                    echo "<h3 class='text-2xl font-bold mb-3'><strong>Job Title: </strong>" . $row["jtitle"] . "</h3>";
                    echo "<p class='text-gray-700 mb-4'><strong>Job Description: </strong>" . $row["jdescription"] . "</p>";
                    echo "<p class='text-gray-500 mb-4'><strong>Company:</strong> " . $row["company_name"] . "</p>";
                    echo "<div class='flex justify-end space-x-2'>";
                    echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                    echo "<input type='hidden' name='delete_job_id' value='" . $row['jid'] . "'>";
                    echo "<button type='submit' name='delete_job' class='bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600' onclick='return confirm(\"Are you sure you want to delete this job posting?\")'>Delete</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-gray-600'>No job postings found.</p>";
            }
            ?>
        </div>
    </div>

</body>

</html>
<?php
ob_end_flush(); // Flush the output buffer and send the output to the browser
?>