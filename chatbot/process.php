<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userMsg = strtolower(trim($_POST['message']));
    $stmt = $conn->prepare("SELECT answer FROM chatbot_qa WHERE LOWER(question) LIKE CONCAT('%', ?, '%') LIMIT 1");
    $stmt->bind_param("s", $userMsg);
    $stmt->execute();
    $stmt->bind_result($response);
    
    if ($stmt->fetch()) {
        echo $response;
    } else {
        echo "Sorry, I couldn't understand. Please contact support.";
    }
    $stmt->close();
}
?>
