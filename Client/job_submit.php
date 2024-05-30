<?php
include "../Connection/db_conn.php"; // Make sure to create and configure your database connection here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jid = $_POST['jid'];
    $jtitle = $_POST['jtitle'];
    $company_name = $_POST['company_name'];
    $jlocation = $_POST['jlocation'];
    $jsalary = $_POST['jsalary'];
    $cat_id = $_POST['cat_id'];
    $eid = $_POST['eid'];
    $jdescription = $_POST['jdescription'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO job (jid,jtitle, jdescription, company_name, jlocation, jsalary, cat_id, eid) VALUES (?,?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssisi", $jid, $jtitle, $jdescription, $company_name, $jlocation, $jsalary, $cat_id, $eid);

    // Execute the query
    if ($stmt->execute()) {
        echo "New job posted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    header("Location: post_job.php");
    $stmt->close();
    $conn->close();
}
?>