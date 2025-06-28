<?php
include '../includes/db.php';
$data = ['Male' => 0, 'Female' => 0, 'Other' => 0];

$res = $conn->query("SELECT gender, COUNT(*) as count FROM users GROUP BY gender");
while ($row = $res->fetch_assoc()) {
    $data[$row['gender']] = (int)$row['count'];
}
echo json_encode($data);
