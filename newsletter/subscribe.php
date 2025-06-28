<?php
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email, date) VALUES (?, NOW())");
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        echo "<script>alert('Subscribed successfully!'); window.location.href='../index.php';</script>";
    } else {
        echo "Something went wrong.";
    }
    $stmt->close();
}
?>
