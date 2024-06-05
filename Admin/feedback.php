<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-serif">
  <?php include "sidebar.php"; ?>
  <div class="content mx-8 py-8 ml-72 mt-1">
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
          echo "<div><strong class='font-semibold'>User:</strong> " . htmlspecialchars($feedback["name"]) . "</div>";
          echo "<div><strong class='font-semibold'>Email:</strong> " . htmlspecialchars($feedback["email"]) . "</div>";
          echo "<div><strong class='font-semibold'>Message:</strong> " . htmlspecialchars($feedback["message"]) . "</div>";
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