<?php
// Fungsi untuk membaca file .env
function loadEnv($file)
{
    if (!file_exists($file)) {
        die("File .env tidak ditemukan!");
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Abaikan komentar
        }
        list($name, $value) = explode('=', $line, 2);
        $_ENV[trim($name)] = trim($value);
    }
}

// Panggil fungsi untuk memuat .env
loadEnv(__DIR__ . '/.env');

// Ambil data koneksi dari .env
$host = $_ENV['sql105.infinityfree.com'];
$dbname = $_ENV['if0_37816661_pdo_kelompok2'];
$username = $_ENV['if0_37816661'];
$password = $_ENV['T4HxGh8S0f'];

try {
    // Buat koneksi menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi berhasil!";
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
