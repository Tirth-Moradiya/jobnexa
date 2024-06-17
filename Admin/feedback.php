<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['username'])) {
  // If not, redirect to the login page
  header("Location: index.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-serif text-black">
  <?php include "sidebar.php"; ?>
  <div class="w-fit ml-80 p-4 mt-5">
    <h2 class="text-3xl font-bold mb-6 text-blue-900">Feedbacks</h2>
    <div id="feedback-list" class="space-y-4">
      <?php
      // Include database connection file
      include "../Connection/db_conn.php";

      // Fetch feedback from the database
      $query = "SELECT * FROM feedback";
      $result = $conn->query($query);

      // Check if there are any feedback records
      if ($result->num_rows > 0) {
        // Output data of each row
        while ($feedback = $result->fetch_assoc()) {
          echo "<div class='bg-white shadow-md p-4 rounded-md'>";
          echo "<div><strong class='font-semibold text-blue-900'>User:</strong> " . htmlspecialchars($feedback["name"]) . "</div>";
          echo "<div><strong class='font-semibold text-blue-900'>Email:</strong> " . htmlspecialchars($feedback["email"]) . "</div>";
          echo "<div><strong class='font-semibold text-blue-900'>Message:</strong> " . htmlspecialchars($feedback["message"]) . "</div>";
          echo "</div>";
        }
      } else {
        echo "<p class='text-gray-600'>No feedback found.</p>";
      }

      // Close database connection
      $conn->close();
      ?>
    </div>
  </div>
</body>

</html>