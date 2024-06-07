<?php
// Include database connection file
include "../Connection/db_conn.php";

// Start the session
session_start();

// Check if the username is set in session
if (!isset($_SESSION['username'])) {
    // Redirect to login page if not logged in
    header("Location: login1.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch job applications submitted by the user
$query = "SELECT ja.jid, ja.applicant_name, ja.applicant_email, ja.cover_letter, ja.resume_path,ja.application_status, j.jtitle AS job_title 
          FROM job_applications ja
          JOIN job j ON ja.jid = j.jid
          WHERE ja.applicant_name = '$username'";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <title>My Job Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../css/applications.css"> -->
</head>

<body class="bg-gray-100">
    <div>
        <?php include "header.php"; ?>
    </div>

    <div class="container mx-auto px-4 py-28 font-serif text-blue-900">
        <h2 class="text-2xl font-bold text-center mb-8 mt-3 ">My Job Applications</h2>
        <?php if ($result->num_rows > 0): ?>
            <div class="overflow-x-auto">
                <table class="table-auto min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-200 text-black">
                        <tr>
                            <th class="py-3 px-4 uppercase font-semibold text-left">Job Title</th>
                            <th class="py-3 px-4 uppercase font-semibold text-left">Applicant Name</th>
                            <th class="py-3 px-4 uppercase font-semibold text-left">Email</th>
                            <th class="py-3 px-4 uppercase font-semibold text-left">Cover Letter</th>
                            <th class="py-3 px-4 uppercase font-semibold text-left">Resume</th>
                            <th class="py-3 px-4 uppercase font-semibold text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($row['job_title']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($row['applicant_name']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($row['applicant_email']); ?></td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($row['cover_letter']); ?></td>
                                <td class="py-3 px-4">
                                    <?php
                                    $resumePath = htmlspecialchars($row['resume_path']);
                                    $fullPath = "../resume_folder/" . $resumePath;
                                    echo "<a href='$fullPath' class='text-blue-500 hover:underline' target='_blank'>View Resume</a>";
                                    ?>
                                </td>
                                <td class="py-3 px-4"><?php echo htmlspecialchars($row['application_status']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600 mt-8">No job applications found.</p>
        <?php endif; ?>
    </div>
</body>

</html>