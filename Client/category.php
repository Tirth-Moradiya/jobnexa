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
      $categories = array(
        array("id" => 1, "name" => "IT", "icon" => "fa-laptop", "vacancy_count" => 10),
        array("id" => 2, "name" => "Marketing", "icon" => "fa-bullhorn", "vacancy_count" => 5),
        array("id" => 3, "name" => "Finance", "icon" => "fa-money", "vacancy_count" => 8),
        array("id" => 4, "name" => "Healthcare", "icon" => "fa-medkit", "vacancy_count" => 12),
        array("id" => 5, "name" => "Education", "icon" => "fa-book", "vacancy_count" => 7),
        array("id" => 5, "name" => "Education", "icon" => "fa-book", "vacancy_count" => 7)
      );
      foreach($categories as $category) {
        echo "
          <div class='col-md-4'>
            <div class='category-card'>
              <i class='fa {$category['icon']}' aria-hidden='true'></i>
              <h3>{$category['name']}</h3>
              <p>Current Vacancies: {$category['vacancy_count']}</p>
            </div>
          </div>
        ";
      }
   ?>
  </div>
</div>
</body>
</html>