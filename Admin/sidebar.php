<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/sidebar.css">
  <script>
    function setActiveLink(element) {
  var links = document.querySelectorAll('.sidebar ul li a');
  for (var i = 0; i < links.length; i++) {
    links[i].classList.remove('active');
  }
  element.classList.add('active');

  var pageTitle = element.textContent;
  document.getElementById('page-heading').textContent = pageTitle;
}

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
      </div>
    </div>
  </header>
  <div class="sidebar">
    <h2>Job Nexa</h2>
    <ul>
      <li><a href="admin_dashboard.php" id="dashboard-link"  >Dashboard</a></li>
      <li><a href="jobs.php" id="jobs-link" >Jobs</a></li>
      <li><a href="users.php" id="candidates-link" >Users</a></li>
      <li><a href="employers.php" id="settings-link" >Employer</a></li>
      <li><a href="#" id="settings-link" >Category</a></li>
      <li><a href="feedback.php" id="settings-link" >Feedbacks</a></li>


    </ul>
  </div>

  
</body>
</html>
