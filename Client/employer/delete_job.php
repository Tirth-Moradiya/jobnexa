<?php
// delete_job.php

// Include database connection file
include "../../Connection/db_conn.php";

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