<?php
try {
    $host = 'localhost';
    $dbname = 'pdo_kelompok2';
    $username = 'root';
    $password = '';

    // Buat koneksi PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Set error mode ke exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Tangkap dan tampilkan error koneksi
    die("Koneksi database gagal: " . $e->getMessage());
}
?>