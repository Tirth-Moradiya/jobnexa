<?php
session_start(); // Start the session to access session variables
include "../Connection/db_conn.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jtitle = $_POST['jtitle'];
    $company_name = $_POST['company_name'];
    $jlocation = $_POST['jlocation'];
    $jsalary = $_POST['jsalary'];
    $cat_id = $_POST['category']; // Get the selected category from the form
    $eid = $_SESSION['eid']; // Get the employer ID from the session
    $jdescription = $_POST['jdescription'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO job (jtitle, jdescription, company_name, jlocation, jsalary, cat_id, eid) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisi", $jtitle, $jdescription, $company_name, $jlocation, $jsalary, $cat_id, $eid);

    // Execute the query
    if ($stmt->execute()) {
        echo "New job posted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>