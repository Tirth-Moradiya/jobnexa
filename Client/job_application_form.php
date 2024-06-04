<?php
// Include database connection file
include "../Connection/db_conn.php";

// Check if the form is submitted
if (isset($_POST['submit_application'])) {
    // Get form data
    $jid = $_POST['jid'];
    $applicant_name = $_POST['applicant_name'];
    $applicant_email = $_POST['applicant_email'];
    $cover_letter = $_POST['cover_letter'];

    // File upload handling
    $resume_filename = $_FILES['resume']['name'];
    $resume_tmp_name = $_FILES['resume']['tmp_name'];
    $resume_path = "../resume_folder/" . $resume_filename; // Adjust the path as needed

    // Move the uploaded resume to the desired directory
    move_uploaded_file($resume_tmp_name, $resume_path);

    // Insert job application data into the database
    $insert_query = "INSERT INTO job_applications (jid, applicant_name, applicant_email, cover_letter, resume_path, application_status) 
                     VALUES ('$jid', '$applicant_name', '$applicant_email', '$cover_letter', '$resume_path', 'Pending')";
    $result = $conn->query($insert_query);

    if ($result) {
        echo "Job application submitted successfully.";
        header("Location:../index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch job postings from the database
$query = "SELECT * FROM job";
$result = $conn->query($query);

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apply for Job</title>
    <link rel="stylesheet" href="../css/job_application_form.css">
</head>

<body>
    <div class="application-container">


        <h2 class="application-title">Apply for Job</h2>
        <form class="application-form" action="job_application_form.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="jid" value="<?php echo isset($_GET['jid']) ? $_GET['jid'] : ''; ?>">
            <label for="applicant_name" class="application-label">Name:</label>
            <input type="text" id="applicant_name" name="applicant_name" class="application-input" required>
            <label for="applicant_email" class="application-label">Email:</label>
            <input type="email" id="applicant_email" name="applicant_email" class="application-input" required>
            <label for="cover_letter" class="application-label">Cover Letter:</label>
            <textarea id="cover_letter" name="cover_letter" class="application-input application-textarea" rows="4"
                required></textarea>
            <label for="resume" class="application-label">Resume:</label>
            <input type="file" id="resume" name="resume" class="application-input" accept=".pdf,.doc,.docx" required>
            <button type="submit" name="submit_application" class="application-button">Apply</button>
        </form>
    </div>
</body>

</html>