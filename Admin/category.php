<?php
// Include database connection file
include "../Connection/db_conn.php";

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
</head>

<body class="bg-gray-100 font-serif">
    <?php include "sidebar.php"; ?>
    <div class="container mt-2 px-4 py-8 ml-72 w-4/5">
        <!-- <h1 class="text-2xl font-bold mb-4">Category Management</h1> -->
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 border border-gray-300">ID</th>
                    <th class="px-6 py-3 border border-gray-300">Name</th>
                    <th class="px-6 py-3 border border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr class="bg-white text-center">
                        <td class="px-6 py-4 border border-gray-300"><?php echo $row['cat_id']; ?></td>
                        <td class="px-6 py-4 border border-gray-300"><?php echo $row['cat_name']; ?></td>
                        <td class="px-6 py-4 border  border-gray-300">
                            <a href="update_category.php?id=<?php echo $row['cat_id']; ?>"
                                class="text-blue-500 hover:text-blue-700 mr-2">Update</a>
                            <a href="delete_category.php?id=<?php echo $row['cat_id']; ?>"
                                class="text-red-500 hover:text-red-700">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>