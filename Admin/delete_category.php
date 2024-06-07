<?php
// Check if the user ID is submitted
if (isset($_POST['cat_id'])) {
    // Include database connection
    include "../Connection/db_conn.php";

    // Get the user ID from the form submission
    $cat_id = $_POST['cat_id'];

    // Prepare and execute the SQL statement to delete the user
    $stmt = $conn->prepare("DELETE FROM category WHERE cat_id = ?");
    $stmt->bind_param("i", $cat_id);

    if ($stmt->execute()) {
        // User deleted successfully
        header("Location: category.php"); // Redirect back to the user list page
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
    header("Location: category.php");
    exit();
}
?>