<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-serif bg-gray-100">

    <?php include "sidebar.php"; ?>

    <div class="w-4/5 ml-72 p-4 mt-5">
        <div class="job-container">
            <?php
            include "../Connection/db_conn.php";

            $query = "SELECT * FROM job";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='job bg-white shadow-md p-4 mb-4'>";
                    echo "<h3 class='text-xl font-bold mb-2'>" . $row["jtitle"] . "</h3>";
                    echo "<p class='mb-2'>" . $row["jdescription"] . "</p>";
                    echo "<p class='mb-2'><strong>Company:</strong> " . $row["company_name"] . "</p>";
                    echo "<div class='action-buttons'>";
                    echo "<button class='bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600'>Delete</button>";
                    echo "<button class='bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600 ml-2'>Update</button>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='text-gray-600'>No job postings found.</p>";
            }
            ?>
        </div>
    </div>

</body>

</html>