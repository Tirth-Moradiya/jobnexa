<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-blue-50">
    <?php include "../header.php"; ?>

    <div class="container mx-auto px-4 py-10 font-serif text-blue-900">
        <h1 class="text-3xl text-center pt-0 font-bold mb-4">Update Job Details</h1>
        <?php
        // Include database connection file
        include "../../Connection/db_conn.php";

        if (isset($_GET['jid'])) {
            $jid = $_GET['jid'];
            // Fetch the job posting from the database using the job ID
            $query = "SELECT * FROM job WHERE jid = '$jid'";
            $result = $conn->query($query);
            $job = $result->fetch_assoc();

            // Display the edit form
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                class="space-y-4 border p-6 rounded-lg bg-white lg:w-2/3 mx-auto">
                <div>
                    <label class="text-black block mb-1 font-bold">Job Title:</label>
                    <input type="text" name="jtitle" value="<?php echo $job['jtitle']; ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="text-black block mb-1 font-bold">Company Name:</label>
                    <input type="text" name="company_name" value="<?php echo $job['company_name']; ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="text-black block mb-1 font-bold">Location:</label>
                    <input type="text" name="jlocation" value="<?php echo $job['jlocation']; ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="text-black block mb-1 font-bold">Description:</label>
                    <textarea name="jdescription"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg"><?php echo $job['jdescription']; ?></textarea>
                </div>
                <div>
                    <label class="text-black block mb-1 font-bold">Salary:</label>
                    <input type="text" name="jsalary" value="<?php echo $job['jsalary']; ?>"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                </div>
                <div>
                    <label class="text-black block mb-1 font-bold">Job Type:</label>
                    <select name="jtype"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="Full-time" <?php if ($job['jtype'] == 'Full-time')
                            echo 'selected'; ?>>Full-time
                        </option>
                        <option value="Part-time" <?php if ($job['jtype'] == 'Part-time')
                            echo 'selected'; ?>>Part-time
                        </option>
                        <option value="Contract" <?php if ($job['jtype'] == 'Contract')
                            echo 'selected'; ?>>Contract
                        </option>
                        <!-- Add more job type options as needed -->
                    </select>
                </div>
                <input type="hidden" name="jid" value="<?php echo $jid; ?>">
                <input type="submit" value="Update Job"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:bg-blue-600">
            </form>
            <?php
        } elseif (isset($_POST['jid'])) {
            $jid = $_POST['jid'];
            $jtitle = $_POST['jtitle'];
            $company_name = $_POST['company_name'];
            $jlocation = $_POST['jlocation'];
            $jdescription = $_POST['jdescription'];
            $jsalary = $_POST['jsalary'];
            $jtype = $_POST['jtype'];

            // Update the job posting in the database
            $query = "UPDATE job SET jtitle = '$jtitle', company_name = '$company_name', jlocation = '$jlocation', jdescription = '$jdescription', jsalary = '$jsalary', jtype = '$jtype' WHERE jid = '$jid'";
            $result = $conn->query($query);
            if ($result) {
                echo 'Job updated successfully!';
                header('Location:../../index.php');
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
    </div>
</body>

</html>