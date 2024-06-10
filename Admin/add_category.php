<?php
// Include database connection file
include "../Connection/db_conn.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categoryName'])) {
    // Sanitize and validate input
    $categoryName = mysqli_real_escape_string($conn, $_POST['categoryName']);

    // Perform database insertion
    $query = "INSERT INTO category (cat_name) VALUES ('$categoryName')";
    if ($conn->query($query) === TRUE) {
        // Category added successfully, you can redirect or display a success message here
        header("Location:category.php");
        exit();
    } else {
        // Error occurred
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Fetch all categories
$query = "SELECT * FROM category";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Close database connection
$conn->close();
?>