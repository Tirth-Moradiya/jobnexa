<?php
// Include database connection file
include "../Connection/db_conn.php";

// Start the session
session_start();


// Check if admin is logged in
if (!isset($_SESSION['username'])) {
  // If not, redirect to the login page
  header("Location: index.php");
  exit();
}


// Fetch total users
$user_query = "SELECT COUNT(*) AS user FROM user";
$user_result = $conn->query($user_query);
$user_row = $user_result->fetch_assoc();
$total_users = $user_row['user'];

// Fetch total employers
$employer_query = "SELECT COUNT(*) AS employer FROM employer";
$employer_result = $conn->query($employer_query);
$employer_row = $employer_result->fetch_assoc();
$total_employers = $employer_row['employer'];

// Fetch total jobs
$job_query = "SELECT COUNT(*) AS total_jobs FROM job";
$job_result = $conn->query($job_query);
$job_row = $job_result->fetch_assoc();
$total_jobs = $job_row['total_jobs'];

// Fetch total applications
$application_query = "SELECT COUNT(*) AS total_applications FROM job_applications";
$application_result = $conn->query($application_query);
$application_row = $application_result->fetch_assoc();
$total_applications = $application_row['total_applications'];

// Close database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

  <?php include "sidebar.php"; ?>
  <div class="content ml-0 md:ml-80 p-4 mt-5 text-blue-900">
    <h2 class="text-3xl font-bold mb-6">Dashboard Overview</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="dashboard-box bg-white p-6 shadow-md rounded-md">
        <h3 class="text-xl font-bold mb-2">Total Users</h3>
        <p class="text-2xl font-bold text-blue-500"><?php echo $total_users; ?></p>
      </div>
      <div class="dashboard-box bg-white p-6 shadow-md rounded-md">
        <h3 class="text-xl font-bold mb-2">Total Employers</h3>
        <p class="text-2xl font-bold text-blue-500"><?php echo $total_employers; ?></p>
      </div>
      <div class="dashboard-box bg-white p-6 shadow-md rounded-md">
        <h3 class="text-xl font-bold mb-2">Total Jobs</h3>
        <p class="text-2xl font-bold text-blue-500"><?php echo $total_jobs; ?></p>
      </div>
      <div class="dashboard-box bg-white p-6 shadow-md rounded-md">
        <h3 class="text-xl font-bold mb-2">Total Applications</h3>
        <p class="text-2xl font-bold text-blue-500"><?php echo $total_applications; ?></p>
      </div>
    </div>

    <div class="chart-container ">
      <canvas id="dashboardChart"></canvas>
    </div>
  </div>

  <script>
    // Get the data from PHP variables
    const totalUsers = <?php echo $total_users; ?>;
    const totalEmployers = <?php echo $total_employers; ?>;
    const totalJobs = <?php echo $total_jobs; ?>;
    const totalApplications = <?php echo $total_applications; ?>;

    // Create a gradient for the bars
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(75, 192, 192, 0.2)');
    gradient.addColorStop(1, 'rgba(75, 192, 192, 1)');

    const dashboardChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Users', 'Employers', 'Jobs', 'Applications'],
        datasets: [{
          label: 'Count',
          data: [totalUsers, totalEmployers, totalJobs, totalApplications],
          backgroundColor: gradient,
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
          hoverBackgroundColor: 'rgba(75, 192, 192, 0.6)',
          hoverBorderColor: 'rgba(75, 192, 192, 1)'
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              font: {
                size: 14,
                family: 'Arial, sans-serif'
              },
              color: '#333'
            },
            grid: {
              color: 'rgba(200, 200, 200, 0.2)'
            }
          },
          x: {
            ticks: {
              font: {
                size: 14,
                family: 'Arial, sans-serif'
              },
              color: '#333'
            },
            grid: {
              color: 'rgba(200, 200, 200, 0.2)'
            }
          }
        },
        plugins: {
          legend: {
            labels: {
              font: {
                size: 16,
                family: 'Arial, sans-serif'
              },
              color: '#333'
            }
          }
        }
      }
    });
  </script>

</body>

</html>