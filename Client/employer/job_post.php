<?php
session_start();
include "../../Connection/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jtitle = $_POST['jtitle'];
    $company_name = $_POST['company_name'];
    $jlocation = $_POST['jlocation'];
    $jsalary = $_POST['jsalary'];
    $cat_id = $_POST['category'];
    $eid = $_SESSION['eid'];
    $jdescription = $_POST['jdescription'];
    $jtype = $_POST['jtype']; // Get the selected job type from the form

    // Adjust the data types in bind_param based on your database schema
    $stmt = $conn->prepare("INSERT INTO job (jtitle, jdescription, company_name, jlocation, jsalary, cat_id, eid, jtype) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdiss", $jtitle, $jdescription, $company_name, $jlocation, $jsalary, $cat_id, $eid, $jtype);

    if ($stmt->execute()) {
        echo "New job posted successfully!";
        header("Location:../../index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>