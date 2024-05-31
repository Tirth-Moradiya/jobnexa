<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/category.css">

</head>

<body>
  <div class="category-section">
    <h2>Explore By Category</h2>
    <div class="row">
      <?php

      include ("./Connection/db_conn.php");

      // Fetch categories from the database
      $query = "SELECT cat_id, cat_name FROM category";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "
            <div class='col-md-4'>
              <div class='category-card'>
              
                <h3>{$row['cat_name']}</h3>
       
              </div>
            </div>
          ";
        }
      } else {
        echo "<p>No categories found</p>";
      }

      // Close connection
      $conn->close();
      ?>
    </div>
  </div>
</body>

</html>