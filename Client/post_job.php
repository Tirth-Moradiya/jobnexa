<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="../css/post_job.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <!-- <?php include "./header.php"; ?> -->
    <div>
        <a href="../index.php">Back</a>
        <h1>Post Job </h1>
        <div class="container">
            <h1>Post a Job</h1>
            <form action="job_submit.php" method="post">
                <label for="jtitle">Job Id</label>
                <input type="text" id="jid" name="jid" required>

                <label for="jtitle">Job Title</label>
                <input type="text" id="jtitle" name="jtitle" required>

                <label for="company_name">Company Name</label>
                <input type="text" id="company_name" name="company_name" required>

                <label for="jlocation">Location</label>
                <input type="text" id="jlocation" name="jlocation" required>

                <label for="jsalary">Salary</label>
                <input type="number" id="jsalary" name="jsalary" required>

                <label for="jdescription">Job Description</label>
                <textarea id="jdescription" name="jdescription" rows="6" required></textarea>

                <label for="cat_id">Category ID</label>
                <input type="number" id="cat_id" name="cat_id" required>

                <label for="eid">Employer ID</label>
                <input type="number" id="eid" name="eid" required>


                <button type="submit">Post Job</button>
            </form>
        </div>
    </div>
</body>

</html>