<?php
// Include database connection file
include "../Connection/db_conn.php";
// Start the session
session_start();


// Check if admin is logged in
if (!isset($_SESSION['username'])) {
    // If not, redirect to the login page
    header("Location: index.php");
    exit();
}


// Fetch all categories
$query = "SELECT * FROM category";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Category Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function openAddCategoryPopup() {
            document.getElementById('addCategoryPopup').classList.remove('hidden');
        }

        function closeAddCategoryPopup() {
            document.getElementById('addCategoryPopup').classList.add('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 font-serif text-blue-900">
    <?php include "sidebar.php"; ?>
    <div class="w-fit ml-80 p-4 mt-5">
        <div class="flex mb-2">
            <h2 class="text-3xl font-bold mb-6">Categories</h2>
            <button onclick="openAddCategoryPopup()"
                class="bg-green-500 mr-5 ml-auto text-white h-12 py-1 px-2 rounded hover:bg-green-600">Add New
                Category</button>
        </div>

        <!-- <h1 class="text-2xl font-bold mb-4">Category Management</h1> -->
        <div class="mt-10 mx-8">

            <table class="p-4x text-center table-auto w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">ID</th>
                        <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">Name</th>
                        <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php
                    include "../Connection/db_conn.php";
                    $sql = "SELECT * FROM category";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='px-4 text-black py-2 border-b border-gray-200'>" . $row["cat_id"] . "</td>";
                            echo "<td class='px-4 text-black py-2 border-b border-gray-200'>" . $row["cat_name"] . "</td>";
                            echo "<td class='px-4 text-black py-2 border-b border-gray-200'>";
                            echo "<form method='POST' action='delete_category.php'>";
                            echo "<input type='hidden' name='cat_id' value='" . $row['cat_id'] . "'>";
                            echo "<button type='submit' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='px-4 py-2 border-b border-gray-200 text-center'>No categories found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="addCategoryPopup" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-8">
            <h2 class="text-xl font-bold mb-4">Add New Category</h2>
            <form action="add_category.php" method="POST">
                <label for="categoryName" class="block mb-2">Category Name:</label>
                <input type="text" name="categoryName" id="categoryName" class="border rounded-md px-3 py-2 mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Add
                    Category</button>
            </form>
            <button onclick="closeAddCategoryPopup()"
                class="bg-gray-300 text-gray-700 py-2 px-4 rounded mt-2 hover:bg-gray-400">Cancel</button>
        </div>
    </div>
</body>

</html>