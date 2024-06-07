<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">

</head>

<body>
  <div class=" bg-gradient-to-r from-sky-50-50 to-indigo-100 py-12 font-serif text-blue-900">
    <div class="mx-auto">
      <h2 class="text-3xl  font-semibold text-center mb-8">Explore By Category</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-20 ">
        <?php
        include ("./Connection/db_conn.php");

        // Fetch categories from the database
        $query = "SELECT cat_id, cat_name FROM category";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "
              <div class='category-card bg-white rounded-lg shadow p-6 transform transition duration-500 hover:scale-105'>
                <h3 class='text-xl text-center font-semibold mb-4'>{$row['cat_name']}</h3>
                <p class='text-gray-600'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla luctus libero vitae lacus blandit, at ullamcorper nunc varius.</p>
                <a href='#' class='block mt-4 no-underline bg-blue-700 text-white py-2 px-4 rounded-lg text-center hover:bg-blue-600'>Explore</a>
              </div>
            ";
          }
        } else {
          echo "<p class='text-center'>No categories found</p>";
        }

        // Close connection
        $conn->close();
        ?>
      </div>
    </div>
  </div>
</body>

</html>