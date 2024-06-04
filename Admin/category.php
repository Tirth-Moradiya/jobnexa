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
    <link rel="stylesheet" href="../css/admin_category.css">
</head>

<body>
    <?php include "sidebar.php"; ?>
    <div class="admin-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['cat_id']; ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td>
                            <a href="update_category.php?id=<?php echo $row['cat_id']; ?>">Update</a> |
                            <a href="delete_category.php?id=<?php echo $row['cat_id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>