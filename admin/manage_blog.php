<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("INSERT INTO blogs (title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $image);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head><title>Manage Blogs</title></head>
<body>
  <h2>Add Blog Post</h2>
  <form method="POST">
    Title: <input type="text" name="title" required><br>
    Content: <textarea name="content" required></textarea><br>
    Image Name: <input type="text" name="image" required><br>
    <input type="submit" value="Post Blog">
  </form>

  <h3>Existing Blogs</h3>
  <ul>
  <?php
    $blogs = $conn->query("SELECT * FROM blogs ORDER BY created_at DESC");
    while ($row = $blogs->fetch_assoc()) {
        echo "<li>{$row['title']} - {$row['created_at']}</li>";
    }
  ?>
  </ul>
</body>
</html>
