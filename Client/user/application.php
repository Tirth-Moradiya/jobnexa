<?php
// Include database connection file
include "../../Connection/db_conn.php";

// Start the session
session_start();

// Check if the username is set in session
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'user') {
    // Redirect to login page if not logged in
    header("Location: ../login1.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch job applications submitted by the user
$query = "SELECT ja.jid, ja.applicant_name, ja.applicant_email, ja.cover_letter, ja.resume_path, ja.application_status, j.jtitle AS job_title 
          FROM job_applications ja
          JOIN job j ON ja.jid = j.jid
          WHERE ja.applicant_name = '$username'";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Job Applications</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-50">
    <div>
        <?php include "../header.php"; ?>
    </div>

    <div class="container mx-auto px-4 py-16 font-serif text-blue-900 w-5/6">
        <h2 class="text-2xl font-bold text-center mb-8 mt-3">My Job Applications</h2>
        <?php if ($result->num_rows > 0): ?>
            <div class="overflow-x-auto mt-10">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 text-blue-900 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Job Title</th>
                            <th class="py-3 px-6 text-left">Applicant Name</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Cover Letter</th>
                            <th class="py-3 px-6 text-left">Resume</th>
                            <th class="py-3 px-6 text-left">Status</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black text-sm font-light">
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($row['job_title']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($row['applicant_name']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($row['applicant_email']); ?></td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($row['cover_letter']); ?></td>
                                <td class="py-3 px-6 text-left">
                                    <?php
                                    $resumePath = htmlspecialchars($row['resume_path']);
                                    $fullPath = "../../resume_folder/" . $resumePath;
                                    echo "<a href='$fullPath' class='text-blue-500 hover:underline' target='_blank'>View Resume</a>";
                                    ?>
                                </td>
                                <td class="py-3 px-6 text-left"><?php echo htmlspecialchars($row['application_status']); ?></td>
                                <td class="py-3 px-6 text-center">
                                    <form action="delete_application.php" method="post"
                                        onsubmit="return confirm('Are you sure you want to delete this application?');">
                                        <input type="hidden" name="jid" value="<?php echo $row['jid']; ?>">
                                        <button type="submit"
                                            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600 mt-8">No job applications found.</p>
        <?php endif; ?>
    </div>
</body>

</html>