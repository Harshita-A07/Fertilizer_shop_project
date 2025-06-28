<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
include '../includes/db.php';

// Get total users
$users = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$products = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$subs = $conn->query("SELECT COUNT(*) AS total FROM newsletter_subscribers")->fetch_assoc()['total'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <h2>Admin Dashboard</h2>

  <p>Total Users: <?= $users ?></p>
  <p>Total Products: <?= $products ?></p>
  <p>Newsletter Subscribers: <?= $subs ?></p>

  <canvas id="genderChart" width="400" height="200"></canvas>

  <script>
    fetch('gender_data.php')
      .then(res => res.json())
      .then(data => {
        const ctx = document.getElementById('genderChart').getContext('2d');
        new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ['Male', 'Female', 'Other'],
            datasets: [{
              label: 'User Gender Distribution',
              data: [data.Male, data.Female, data.Other],
              backgroundColor: ['#66bb6a', '#ef5350', '#ffa726']
            }]
          }
        });
      });
  </script>

  <br>
  <a href="manage_products.php">Manage Products</a><br>
  <a href="manage_blog.php">Manage Blogs</a><br>
  <a href="logout.php">Logout</a>
</body>
</html>
