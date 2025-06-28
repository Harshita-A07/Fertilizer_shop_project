<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $image = $_POST['image']; // store image name or URL

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image, stock) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsi", $name, $desc, $price, $image, $stock);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head><title>Manage Products</title></head>
<body>
  <h2>Add New Product</h2>
  <form method="POST">
    Name: <input type="text" name="name" required><br>
    Desc: <textarea name="desc" required></textarea><br>
    Price: <input type="number" step="0.01" name="price" required><br>
    Image Name: <input type="text" name="image" required><br>
    Stock: <input type="number" name="stock" required><br>
    <input type="submit" value="Add Product">
  </form>

  <h3>Current Products</h3>
  <ul>
  <?php
    $result = $conn->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['name']} - ₹{$row['price']} | Stock: {$row['stock']}</li>";
    }
  ?>
  </ul>
</body>
</html>
