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
    <link rel="stylesheet" href="../css/applications.css">
    <link rel="stylesheet" href="../css/header.css">

</head>

<body>
    <!-- <div>
        <?php include "header.php"; ?>
    </div> -->
    <div class="application-container">
        <h2 class="application-title">My Job Applications</h2>
        <?php if ($result->num_rows > 0): ?>
            <table class="application-table">
                <thead>
                    <tr>
                        <th>Job Title</th>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Cover Letter</th>
                        <th>Resume</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['job_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['applicant_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['applicant_email']); ?></td>
                            <td><?php echo htmlspecialchars($row['cover_letter']); ?></td>
                            <td>
                                <?php
                                $resumePath = htmlspecialchars($row['resume_path']);
                                $fullPath = "../resume_folder/" . $resumePath;
                                echo "<a href='$fullPath' target='_blank'>View Resume</a>";
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['application_status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No job applications found.</p>
        <?php endif; ?>
    </div>
</body>

</html>