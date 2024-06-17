<?php
// delete_job.php

// Include database connection file
include "../../Connection/db_conn.php";
session_start();

// Check if the username is set in session
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'employer') {
    // Redirect to login page if not logged in
    header("Location: ../login1.php");
    exit();

}

if (isset($_GET['jid'])) {
    $jid = $_GET['jid'];
    // Delete the job from the database using the job ID
    $query = "DELETE FROM job WHERE jid = '$jid'";
    $result = $conn->query($query);
    if ($result) {
        echo 'Job deleted successfully!';
        header('Location:../../index.php');
    } else {
        echo 'Error deleting job!';
    }
} else {
    echo 'Invalid request!';
}

// Close database connection
$conn->close();
?>