<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/jobs.css">
</head>
<body>
    <?php include "sidebar.php"; ?>
    <div class="content">
    <h2>All Jobs</h2>

    <div class="job-container">
      <?php
              include "../Connection/db_conn.php";

      // Your PHP code to fetch jobs from the database and loop through them to display here
      // For demonstration purpose, I'm using static data

     $query = "SELECT * FROM job";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<div class='job'>";
        echo "<h3>". $row["jtitle"] . "</h3>";
        echo "<p>" . $row["jdescription"] . "</p>";
        echo "<p><strong>Company:</strong> " . $row["company_name"] . "</p>";
        echo "<div class='action-buttons'>";
        echo "<button onclick>Delete</button>";
        echo "<button onclick>Update</button>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No job postings found.";
}
      ?>
    </div>
  </div>

</body>
</html>