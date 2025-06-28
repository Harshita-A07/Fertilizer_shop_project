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
<head><title>Shop Products</title></head>
<body>
  <h2>Available Products</h2>
  <ul>
    <?php
    $res = $conn->query("SELECT * FROM products WHERE stock > 0");
    while ($row = $res->fetch_assoc()) {
        echo "<li>
                <strong>{$row['name']}</strong><br>
                ₹{$row['price']} | {$row['description']}<br>
                <img src='../assets/images/{$row['image']}' width='100'><br>
                <a href='buy.php?id={$row['id']}'>Buy</a>
              </li><br>";
    }
    ?>
  </ul>
</body>
</html>
