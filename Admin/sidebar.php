<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/sidebar.css">
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

<body>
  <header class="header">
    <div class="brand">Job Nexa</div>
    <div class="admin-info">
      <img src="admin-icon.png" alt="Admin Icon">
      <div class="admin-details">
        <div class="admin-name">John Doe</div>
        <div class="admin-attributes">Admin</div>
        <a href="logout.php" class="logout-link">Logout</a>
      </div>
    </div>
  </header>
  <div class="sidebar">
    <h2>Job Nexa</h2>
    <ul>
      <li><a href="admin_dashboard.php" id="dashboard-link" onclick="setActiveLink(this)">Dashboard</a></li>
      <li><a href="jobs.php" id="jobs-link" onclick="setActiveLink(this)">Jobs</a></li>
      <li><a href="users.php" id="users-link" onclick="setActiveLink(this)">Users</a></li>
      <li><a href="employers.php" id="employers-link" onclick="setActiveLink(this)">Employers</a></li>
      <li><a href="category.php" id="category-link" onclick="setActiveLink(this)">Category</a></li>
      <li><a href="feedback.php" id="feedback-link" onclick="setActiveLink(this)">Feedbacks</a></li>
    </ul>
  </div>
  <div class="content">
    <h2 id="page-heading">Dashboard</h2>
    <!-- Content goes here -->
  </div>
</body>

</html>