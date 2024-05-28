<?php
include "../Connection/db_conn.php"; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $uid = $_POST["user_id"];
    $uname = $_POST["user_name"];
    $uemail = $_POST["user_email"];
    $upassword = $_POST["user_password"];
    $ugender = $_POST["user_gender"];
    $uphonenumber = $_POST["user_phonenumber"];
    $uaddress = $_POST["user_address"];
    $ustate = $_POST["user_state"];
    $ucity = $_POST["user_city"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO user (uid, uname, uemail, upassword, ugender, uphonenumber, uaddress, ustate, ucity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $uid, $uname, $uemail, $upassword, $ugender, $uphonenumber, $uaddress, $ustate, $ucity);

    // Execute the query
    if ($stmt->execute()) {
        echo "User signed up successfully!";
        header("Location:login1.php");

    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>