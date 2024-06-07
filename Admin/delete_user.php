<?php
// Check if the user ID is submitted
if (isset($_POST['user_id'])) {
    // Include database connection
    include "../Connection/db_conn.php";

    // Get the user ID from the form submission
    $uid = $_POST['user_id'];

    // Prepare and execute the SQL statement to delete the user
    $stmt = $conn->prepare("DELETE FROM user WHERE uid = ?");
    $stmt->bind_param("i", $uid);

    if ($stmt->execute()) {
        // User deleted successfully
        header("Location: users.php"); // Redirect back to the user list page
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
    header("Location: users.php");
    exit();
}
?>