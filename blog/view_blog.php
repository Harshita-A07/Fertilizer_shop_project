<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../user/login.php");
    exit();
}
include '../includes/db.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Blog Articles</title>
</head>
<body>
  <h2>Latest Blog Posts</h2>

  <?php
  $result = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
  while ($row = $result->fetch_assoc()) {
      echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>
              <h3>{$row['title']}</h3>
              <img src='../assets/images/{$row['image']}' width='200'><br>
              <p>{$row['content']}</p>
              <small>Posted on: {$row['created_at']}</small>
            </div>";
  }
  ?>
</body>
</html>
