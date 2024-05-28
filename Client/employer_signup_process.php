<?php
include "../Connection/db_conn.php"; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $eid = $_POST["employer_id"];
    $ename = $_POST["employer_name"];
    $eemail = $_POST["employer_email"];
    $epassword = $_POST["employer_password"];
    $ecompany = $_POST["employer_company"];
    $industryname = $_POST["industry_name"];
    $website = $_POST["website"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO employer (eid, ename, eemail, epassword, ecompany, industry_name, website) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $eid, $ename, $eemail, $epassword, $ecompany, $industryname, $website);

    // Execute the query
    if ($stmt->execute()) {
        echo "Employer signed up successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
