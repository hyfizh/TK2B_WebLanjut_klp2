<?php
include 'config.php'; // Pastikan file koneksi diatur dengan benar

header('Content-Type: application/json');

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>