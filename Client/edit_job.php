<html>

</html>

<head>
    <link rel="stylesheet" href="../css/edit_job.css">
</head>

<body>
    <h1>Update Job Details</h1>
    <?php
    // Include database connection file
    include "../Connection/db_conn.php";

    if (isset($_GET['jid'])) {
        $jid = $_GET['jid'];
        // Fetch the job posting from the database using the job ID
        $query = "SELECT * FROM job WHERE jid = '$jid'";
        $result = $conn->query($query);
        $job = $result->fetch_assoc();

        // Display the edit form
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>Job Title:</label>
            <input type="text" name="jtitle" value="<?php echo $job['jtitle']; ?>"><br><br>
            <label>Company Name:</label>
            <input type="text" name="company_name" value="<?php echo $job['company_name']; ?>"><br><br>
            <label>Location:</label>
            <input type="text" name="jlocation" value="<?php echo $job['jlocation']; ?>"><br><br>
            <label>Description:</label>
            <textarea name="jdescription"><?php echo $job['jdescription']; ?></textarea><br><br>
            <label>Salary:</label>
            <input type="text" name="jsalary" value="<?php echo $job['jsalary']; ?>"><br><br>
            <input type="hidden" name="jid" value="<?php echo $jid; ?>">
            <input type="submit" value="Update Job">
        </form>
        <?php
    } elseif (isset($_POST['jid'])) {
        $jid = $_POST['jid'];
        $jtitle = $_POST['jtitle'];
        $company_name = $_POST['company_name'];
        $jlocation = $_POST['jlocation'];
        $jdescription = $_POST['jdescription'];
        $jsalary = $_POST['jsalary'];

        // Update the job posting in the database
        $query = "UPDATE job SET jtitle = '$jtitle', company_name = '$company_name', jlocation = '$jlocation', jdescription = '$jdescription', jsalary = '$jsalary' WHERE jid = '$jid'";
        $result = $conn->query($query);
        if ($result) {
            echo 'Job updated successfully!';
            header('Location:../index.php');
            exit;
        } else {
            echo 'Error updating job!';
        }
    } else {
        echo 'Invalid request!';
    }

    // Close database connection
    $conn->close();
    ?>
</body>

</html>