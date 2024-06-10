<?php
include "../Connection/db_conn.php";

// Fetch categories from the database
$query = "SELECT * FROM category";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Post Job</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="font-roboto   font-serif bg-gray-100">
    <?php include "./header.php"; ?>
    <div class=" mx-auto px-4 py-20">
        <a href="../index.php"
            class="text-blue-500 hover:text-blue-700 inline-block mb-4 px-2 py-2 border border-blue-500 rounded transition duration-300 ease-in-out transform hover:scale-105">Back</a>
        <h1 class="text-2xl font-bold mb-6 text-center">Post a Job</h1>
        <div class="w-full md:w-3/4 mx-auto bg-white rounded-lg shadow-lg p-6">
            <form action="job_submit.php" method="post" class="space-y-6">
                <div>
                    <label for="jtitle" class="block mb-2 text-gray-700">Job Title</label>
                    <input type="text" id="jtitle" name="jtitle"
                        class="w-full  border rounded-lg border-gray-300 focus:outline-none focus:border-blue-500   py-2 px-3 placeholder-gray-400 text-gray-900 mb-4"
                        placeholder="Enter job title" required>
                </div>
                <div>
                    <label for="company_name" class="block mb-2 text-gray-700">Company Name</label>
                    <input type="text" id="company_name" name="company_name"
                        class="w-full  border rounded-lg border-gray-300 focus:outline-none focus:border-blue-500   py-2 px-3 placeholder-gray-400 text-gray-900 mb-4"
                        placeholder="Enter company name" required>
                </div>
                <div>
                    <label for="jlocation" class="block mb-2 text-gray-700">Location</label>
                    <input type="text" id="jlocation" name="jlocation"
                        class="w-full  border rounded-lg border-gray-300 focus:outline-none focus:border-blue-500   py-2 px-3 placeholder-gray-400 text-gray-900 mb-4"
                        placeholder="Enter location" required>
                </div>
                <div>
                    <label for="jsalary" class="block mb-2 text-gray-700">Salary</label>
                    <input type="number" id="jsalary" name="jsalary"
                        class="w-full  border rounded-lg border-gray-300 focus:outline-none focus:border-blue-500   py-2 px-3 placeholder-gray-400 text-gray-900 mb-4"
                        placeholder="Enter salary" required>
                </div>
                <div>
                    <label for="jdescription" class="block mb-2 text-gray-700">Job Description</label>
                    <textarea id="jdescription" name="jdescription" rows="6"
                        class="w-full border border-gray-300 focus:outline-none focus:border-blue-500   py-2 px-3 placeholder-gray-400 text-gray-900 mb-4"
                        placeholder="Enter job description" required></textarea>
                </div>
                <label for="jtype" class="block text-sm font-medium text-gray-700">Job Type</label>
                <select id="jtype" name="jtype"
                    class="w-full  border rounded-lg border-gray-300 focus:outline-none focus:border-blue-500   py-2 px-3 placeholder-gray-400 text-gray-900 mb-4">
                    <option value="full-time">Full-time</option>
                    <option value="part-time">Part-time</option>
                    <option value="contract">Contract</option>
                    <!-- Add more options as needed -->
                </select>

                <div>
                    <label for="category" class="block mb-2 text-gray-700">Category</label>
                    <select id="category" name="category"
                        class="w-full  border rounded-lg border-gray-300 focus:outline-none focus:border-blue-500   py-2 px-3 placeholder-gray-400 text-gray-900 mb-4"
                        required>
                        <?php
                        // Loop through each category and generate an option element
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" id="eid" name="eid" value="<?php echo $_SESSION['eid']; ?>" required>
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Post
                    Job</button>
            </form>
        </div>
    </div>
</body>

</html>