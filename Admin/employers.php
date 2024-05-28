<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/employers.css">

</head>

<body>
  <?php include "sidebar.php"; ?>
  <div class="content">
    <h2>All Employers</h2>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Employer Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Company Name</th>
          <th>Industry</th>
          <th>Website</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "../Connection/db_conn.php";
        // Your PHP code to fetch employers from the database and loop through them to display here
        // For demonstration purpose, I'm using static data
        
        // $employers = [
        //   ["id" => 1, "employer name" => "Company A", "email" => "companya@example.com","password"=>"123450","company name"=>"abc cmp","industry"=>"yuy","website"=>"xyz.com"],
        //   ["id" => 2, "employer name" => "Company B", "email" => "companyb@example.com","password"=>"123450","company name"=>"abc cmp","industry"=>"yuy","website"=>"xyz.com"],
        //   ["id" => 3, "employer name" => "Company C", "email" => "companyc@example.com","password"=>"123450","company name"=>"abc cmp","industry"=>"yuy","website"=>"xyz.com"],
        // ];
        
        $sql = "select *from employer";
        $result = $conn->query($sql);



        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["eid"] . "</td>";
            echo "<td>" . $row["ename"] . "</td>";
            echo "<td>" . $row["eemail"] . "</td>";
            echo "<td>" . $row["epassword"] . "</td>";
            echo "<td>" . $row["ecompany"] . "</td>";
            echo "<td>" . $row["industryname"] . "</td>";
            echo "<td>" . $row["website"] . "</td>";

            echo "<td><button onclick='deleteEmployer(" . $row["eid"] . ")'>Delete</button></td>";
            echo "</tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>