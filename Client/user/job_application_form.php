<?php
// Include database connection file
include "../../Connection/db_conn.php";
session_start();

// Check if the username is set in session
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'user') {
    // Redirect to login page if not logged in
    header("Location: ../login1.php");
    exit();
}

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
        header("Location:../../index.php");
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-blue-50 font-serif text-blue-900">
    <?php include "../header.php"; ?>
    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-3xl font-semibold text-center mb-6">Apply for Job</h2>
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="job_application_form.php"
                    method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="jid" value="<?php echo isset($_GET['jid']) ? $_GET['jid'] : ''; ?>">
                    <div class="mb-4">
                        <label for="applicant_name" class="block text-black text-sm font-bold mb-2">Name:</label>
                        <input type="text" id="applicant_name" name="applicant_name" class="form-control py-2 px-3"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="applicant_email" class="block text-black text-sm font-bold mb-2">Email:</label>
                        <input type="email" id="applicant_email" name="applicant_email" class="form-control py-2 px-3"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="cover_letter" class="block text-black text-sm font-bold mb-2">Cover
                            Letter:</label>
                        <textarea id="cover_letter" name="cover_letter" class="form-control py-2 px-3"
                            required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="resume" class="block text-black text-sm font-bold mb-2">Resume:</label>
                        <input type="file" id="resume" name="resume" class="form-control py-2 px-3"
                            accept=".pdf,.doc,.docx" required>
                    </div>
                    <button type="submit" name="submit_application" class="btn btn-primary">Apply</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>