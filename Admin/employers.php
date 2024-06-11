<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
  <?php include "sidebar.php"; ?>
  <div class="w-fit ml-80 p-4 mt-5 text-blue-900">
    <h2 class="text-3xl font-bold mb-6">All Employers</h2>
    <div class="mt-10 mx-8">
      <table class="table-auto w-full bg-white border border-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">ID</th>
            <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">Employer Name</th>
            <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">Email</th>
            <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">Password</th>
            <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">Company Name</th>
            <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">Industry</th>
            <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">Website</th>
            <th class="px-4 py-2 bg-gray-50 border-b border-gray-200">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php
          include "../Connection/db_conn.php";
          $sql = "SELECT * FROM employer";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td class='px-4 text-black py-2 border-b border-gray-200'>" . $row["eid"] . "</td>";
              echo "<td class='px-4 text-black py-2 border-b border-gray-200'>" . $row["ename"] . "</td>";
              echo "<td class='px-4 text-black py-2 border-b border-gray-200'>" . $row["eemail"] . "</td>";
              echo "<td class='px-4 text-black py-2 border-b border-gray-200'>" . $row["epassword"] . "</td>";
              echo "<td class='px-4 text-black py-2 border-b border-gray-200'>" . $row["ecompany"] . "</td>";
              echo "<td class='px-4 text-black py-2 border-b border-gray-200'>" . $row["industryname"] . "</td>";
              echo "<td class='px-4 text-black py-2 border-b border-gray-200'>" . $row["website"] . "</td>";
              echo "<td class='px-4 text-black py-2 border-b border-gray-200'>";
              echo "<form method='POST' action='delete_employer.php'>";
              echo "<input type='hidden' name=eid' value='" . $row['eid'] . "'>";
              echo "<button type='submit' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded'>Delete</button>";
              echo "</form>";
              echo "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='10' class='px-4 py-2 whitespace-nowrap text-center'>No employers found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>