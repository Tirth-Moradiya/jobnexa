<?php
include "../Connection/db_conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Determine user type and retrieve user ID from session
    session_start();
    $uid = isset($_SESSION["uid"]) ? $_SESSION["uid"] : "";
    $eid = isset($_SESSION["eid"]) ? $_SESSION["eid"] : "";

    // Determine the appropriate ID to use based on user type
    $user_type = isset($_SESSION["user_type"]) ? $_SESSION["user_type"] : "";
    $id_to_use = "";
    if ($user_type === "user" && $uid !== "") {
        $id_to_use = $uid;
    } elseif ($user_type === "employer" && $eid !== "") {
        $id_to_use = $eid;
    } else {
        // Handle the case where the user ID or employer ID is not set
        echo "Error: User ID or Employer ID not found.";
        exit; // Exit the script to prevent further execution
    }

    // Insert feedback into the database
    $insert_query = "INSERT INTO feedback (user_id, name, email, message) VALUES ('$id_to_use', '$name', '$email', '$message')";
    $result = $conn->query($insert_query);

    if ($result) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>