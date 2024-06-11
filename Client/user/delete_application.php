<?php
// Include database connection file
include "../../Connection/db_conn.php";

// Start the session
session_start();

// Check if the username is set in session and the delete request is valid
if (!isset($_SESSION['username']) || !isset($_POST['jid'])) {
    // Redirect to login page if not logged in or invalid request
    header("Location: ../login1.php");
    exit();
}

$username = $_SESSION['username'];
$jid = $_POST['jid'];

// Prepare and execute the delete query
$query = $conn->prepare("DELETE FROM job_applications WHERE jid = ? AND applicant_name = ?");
$query->bind_param("is", $jid, $username);

if ($query->execute()) {
    // Redirect to job applications page with success message
    header("Location: job_applications.php?message=deleted");
    header("Location:application.php");
} else {
    // Redirect to job applications page with error message
    header("Location: job_applications.php?message=error");
}

// Close database connection
$conn->close();
?>