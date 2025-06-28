<?php
session_start();
if (!isset($_SESSION['user_id']) || !isset($_GET['id'])) {
    header("Location: view.php");
    exit();
}
include '../includes/db.php';

$product_id = intval($_GET['id']);
$user_id = $_SESSION['user_id'];

// Decrease stock
$conn->query("UPDATE products SET stock = stock - 1 WHERE id = $product_id AND stock > 0");

// Record purchase
$stmt = $conn->prepare("INSERT INTO purchases (user_id, product_id) VALUES (?, ?)");
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();

echo "<script>alert('Purchase successful!'); window.location.href='view.php';</script>";
