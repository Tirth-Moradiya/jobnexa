<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/users.css">
</head>

<body>
  <?php include "sidebar.php" ?>
  <div class="content">

    <h2>All Users</h2>

    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Gender</th>
          <th>Phone number</th>
          <th>Address</th>
          <th>State</th>
          <th>City</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Your PHP code to fetch users from the database and loop through them to display here
        // For demonstration purpose, I'm using static data
        
        include "../Connection/db_conn.php";

        // $users = [
        //   ["id" => 1, "name" => "John Doe", "email" => "john@example.com","password"=>"1230","gender"=>"male","phone number"=>"5967485968","address"=>"abc","state"=>"xyz","city"=>"aaa"],
        //   ["id" => 2, "name" => "Jane Doe", "email" => "jane@example.com","password"=>"1230","gender"=>"male","phone number"=>"5967485968","address"=>"abc","state"=>"xyz","city"=>"aaa"],
        //   ["id" => 3, "name" => "Alice Smith", "email" => "alice@example.com","password"=>"1230","gender"=>"male","phone number"=>"5967485968","address"=>"abc","state"=>"xyz","city"=>"aaa"],
        // ];
        
        $sql = "select *from user";
        $result = $conn->query($sql);



        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["uid"] . "</td>";
            echo "<td>" . $row["uname"] . "</td>";
            echo "<td>" . $row["uemail"] . "</td>";
            echo "<td>" . $row["upassword"] . "</td>";
            echo "<td>" . $row["ugender"] . "</td>";
            echo "<td>" . $row["uphonenumber"] . "</td>";
            echo "<td>" . $row["uaddress"] . "</td>";
            echo "<td>" . $row["ustate"] . "</td>";
            echo "<td>" . $row["ucity"] . "</td>";
            echo "<td><button onclick='deleteUser(" . $row["uid"] . ")'>Delete</button></td>";
            echo "</tr>";
          }
        } else {
          echo "0 result";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>