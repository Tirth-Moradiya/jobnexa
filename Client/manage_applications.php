<?php
// Include database connection file
include "../Connection/db_conn.php";

// Start the session
session_start();

// Check if the user is logged in and is an employer
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'employer') {
    // Redirect to login page if not logged in as an employer
    header("Location: login.php");
    exit();
}

// Get the employer's name from the session
$employer_name = $_SESSION['username']; // Adjust this according to your session data

// Fetch the employer's ID using their name
$query = "SELECT eid FROM employer WHERE ename = '$employer_name'";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$row = $result->fetch_assoc();
$employer_id = $row['eid'];

// Check if the form is submitted to update application status
if (isset($_POST['update_status'])) {
    $application_id = $_POST['application_id'];
    $new_status = $_POST['new_status'];

    // Update application status in the database
    $update_query = "UPDATE job_applications SET application_status = '$new_status' WHERE jid = '$application_id'";
    $update_result = $conn->query($update_query);

    if ($update_result) {
        echo "Application status updated successfully.";
    } else {
        echo "Error updating application status: " . $conn->error;
    }
}

// Fetch job applications for the logged-in employer
$query = "SELECT ja.jid, ja.applicant_name, ja.applicant_email, ja.cover_letter, ja.resume_path, ja.application_status, j.jtitle AS job_title 
          FROM job_applications ja
          JOIN job j ON ja.jid = j.jid
          WHERE j.eid = '$employer_id'";
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
    <title>Manage Job Applications</title>
    <link rel="stylesheet" href="../css/manage_applications.css">
</head>

<body>
    <div class="application-container">
        <center>
            <h2 class="application-title">Manage Job Applications</h2>
        </center>
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
                        <th>Action</th>
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
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="application_id" value="<?php echo $row['jid']; ?>">
                                    <select name="new_status">
                                        <option value="Pending" <?php if ($row['application_status'] === 'Pending')
                                            echo 'selected'; ?>>Pending</option>
                                        <option value="Reviewed" <?php if ($row['application_status'] === 'Reviewed')
                                            echo 'selected'; ?>>Reviewed</option>
                                        <option value="Accepted" <?php if ($row['application_status'] === 'Accepted')
                                            echo 'selected'; ?>>Accepted</option>
                                        <option value="Rejected" <?php if ($row['application_status'] === 'Rejected')
                                            echo 'selected'; ?>>Rejected</option>
                                    </select>
                                    <button type="submit" name="update_status">Update</button>
                                </form>
                            </td>
                            <td>
                                <a href="delete_application.php?id=<?php echo $row['jid']; ?>">Delete</a>
                            </td>
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