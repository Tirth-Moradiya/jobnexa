<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Additional CSS for Active Link */
    .active {
      background-color: black;
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

  <header class="bg-white shadow py-4 px-8">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-lg font-bold text-gray-900">Job Nexa</h1>
      <div class="flex items-center">
        <img src="admin-icon.png" alt="Admin Icon" class="w-10 h-10 rounded-full mr-2">
        <div class="text-sm">
          <div class="font-semibold">John Doe</div>
          <div class="text-gray-600">Admin</div>
        </div>
        <a href="index.php"
          class="ml-4 inline-block py-1 px-3 bg-red-500 text-white rounded hover:bg-red-600">Logout</a>
      </div>
    </div>
  </header>

  <div class="flex h-0">
    <div class="w-1/5 p-4 mt-5">
      <!-- <h2 class="text-center text-lg font-bold mb-4">Job Nexa</h2> -->
      <ul class="space-y-2 ">
        <li><a href="admin_dashboard.php" id="dashboard-link" onclick="setActiveLink(this)"
            class="block py-2 text-center px-4 rounded hover:bg-red-500 hover:text-white active">Dashboard</a></li>
        <li><a href="jobs.php" id="jobs-link" onclick="setActiveLink(this)"
            class="block py-2 mt-4 text-center px-4 rounded hover:bg-red-500 hover:text-white active">Jobs</a></li>
        <li><a href="users.php" id="users-link" onclick="setActiveLink(this)"
            class="block py-2 mt-4 text-center px-4 rounded hover:bg-red-500 hover:text-white active">Users</a></li>
        <li><a href="employers.php" id="employers-link" onclick="setActiveLink(this)"
            class="block py-2 mt-4 text-center px-4 rounded hover:bg-red-500 hover:text-white active">Employers</a></li>
        <li><a href="category.php" id="category-link" onclick="setActiveLink(this)"
            class="block py-2 mt-4 text-center px-4 rounded hover:bg-red-500 hover:text-white active">Category</a></li>
        <li><a href="feedback.php" id="feedback-link" onclick="setActiveLink(this)"
            class="block py-2 mt-4 text-center px-4 rounded hover:bg-red-500 hover:text-white active">Feedbacks</a></li>
      </ul>
    </div>

  </div>

</body>

</html>