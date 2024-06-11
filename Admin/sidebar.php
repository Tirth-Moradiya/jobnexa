<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <style>
    /* Additional CSS for Active Link */
    .active {
      background-color: darkblue;
      color: white;
    }
  </style>
  <script>
    // Function to set the active link
    function setActiveLink(element) {
      var links = document.querySelectorAll('.sidebar ul li a');
      for (var i = 0; i < links.length; i++) {
        links[i].classList.remove('active');
      }
      element.classList.add('active');

      var pageTitle = element.textContent;
      document.getElementById('page-heading').textContent = pageTitle;
    }

    // Function to set the active link based on the current URL
    function setInitialActiveLink() {
      var links = document.querySelectorAll('.sidebar ul li a');
      var currentURL = window.location.href;
      for (var i = 0; i < links.length; i++) {
        if (currentURL.indexOf(links[i].getAttribute('href')) !== -1) {
          links[i].classList.add('active');
          var pageTitle = links[i].textContent;
          document.getElementById('page-heading').textContent = pageTitle;
        }
      }
    }

    // Set the active link on page load
    window.onload = setInitialActiveLink;
  </script>
</head>

<body class="font-serif bg-gray-100">

  <header class="bg-white shadow py-4 px-8 fixed w-full z-10">
    <div class=" mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold text-gray-900 ml-16">Job Nexa</h1>
      <div class="flex items-center">
        <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_640.png" alt="Admin Icon"
          class="w-10 h-10 rounded-full mr-2">
        <div class="text-sm">
          <div class="font-semibold">
            <?php
            // Start the session
            // Check if admin name is set in session
            if (isset($_SESSION['admin_name'])) {
              echo $_SESSION['admin_name'];
            }
            ?>
          </div>
          <div class="text-gray-600">Admin</div>
        </div>

      </div>
    </div>
  </header>


  <div class="flex">
    <div class="w-1/5 fixed h-full bg-white shadow-md p-4 pt-28 sidebar">
      <ul class="space-y-5">
        <li><a href="admin_dashboard.php" id="dashboard-link" onclick="setActiveLink(this)"
            class="block py-2 text-center px-4 rounded hover:bg-blue-900 hover:text-white">
            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a></li>
        <li><a href="jobs.php" id="jobs-link" onclick="setActiveLink(this)"
            class="block py-2 text-center px-4 rounded hover:bg-blue-900 hover:text-white">
            <i class="fas fa-briefcase mr-2"></i>Jobs</a></li>
        <li><a href="users.php" id="users-link" onclick="setActiveLink(this)"
            class="block py-2 text-center px-4 rounded hover:bg-blue-900 hover:text-white">
            <i class="fas fa-users mr-2"></i>Users</a></li>
        <li><a href="employers.php" id="employers-link" onclick="setActiveLink(this)"
            class="block py-2 text-center px-4 rounded hover:bg-blue-900 hover:text-white">
            <i class="fas fa-user-tie mr-2"></i>Employers</a></li>
        <li><a href="category.php" id="category-link" onclick="setActiveLink(this)"
            class="block py-2 text-center px-4 rounded hover:bg-blue-900 hover:text-white">
            <i class="fas fa-tags mr-2"></i>Category</a></li>
        <li><a href="feedback.php" id="feedback-link" onclick="setActiveLink(this)"
            class="block py-2 text-center px-4 rounded hover:bg-blue-900 hover:text-white">
            <i class="fas fa-comments mr-2"></i>Feedbacks</a></li>
      </ul>


      <a href="../Client/logout.php"
        class="mt-60 text-center inline-block w-full py-1 px-3 bg-red-500 text-white rounded hover:bg-red-600">Logout</a>
    </div>

    <div class="ml-1/5 w-4/5 p-8 pt-0">
      <h2 id="page-heading" class="text-2xl font-bold mb-4">Dashboard</h2>
      <!-- Your page content goes here -->
    </div>
  </div>

</body>

</html>