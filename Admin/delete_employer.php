<?php
// Check if the user ID is submitted
if (isset($_POST['eid'])) {
    // Include database connection
    include "../Connection/db_conn.php";

    // Get the user ID from the form submission
    $eid = $_POST['eid'];

    // Prepare and execute the SQL statement to delete the user
    $stmt = $conn->prepare("DELETE FROM employer WHERE eid = ?");
    $stmt->bind_param("i", $eid);

    if ($stmt->execute()) {
        // User deleted successfully
        header("Location: employers.php"); // Redirect back to the user list page
        exit();
    } else {
        // Error occurred while deleting the user
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to the user list page if no user ID is submitted
    header("Location: employers.php");
    exit();
}
?>