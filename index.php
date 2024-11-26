<?php
// Memasukkan file koneksi
include 'admin/koneksi.php';

// Menentukan halaman yang ingin ditampilkan
$page = isset($_GET['p']) ? $_GET['p'] : 'home';

// Mengambil data mahasiswa dari database jika 'mhs' dipilih
if ($page == 'mhs') {
    $stmt = $pdo->query("SELECT * FROM mahasiswa");
    $mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
        }

        .sidebar .nav-link {
            color: #000;
        }

        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            color: #000;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">KELOMPOK 2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'home' ? 'active' : ''); ?>" href="?p=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'mhs' ? 'active' : ''); ?>" href="?p=mhs">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Prodi</a>
                    </li>
                </ul>
                <!-- Tombol Logout -->
                <a href="#" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Layout -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar p-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'home' ? 'active' : ''); ?>" href="?p=home">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page == 'mhs' ? 'active' : ''); ?>" href="?p=mhs">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Prodi</a>
                    </li>
                </ul>
            </nav>

            <!-- Content -->
            <main class="col-md-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>List Mahasiswa</h2>
                </div>

                <?php
                if ($page == 'mhs') {
                    // Menampilkan data mahasiswa
                    if (!empty($mahasiswa)) {
                        echo '<table class="table">';
                        echo '<thead><tr><th>NIM</th><th>Nama</th><th>Email</th><th>Prodi ID</th></tr></thead><tbody>';
                        foreach ($mahasiswa as $mhs) {
                            echo "<tr><td>{$mhs['nim']}</td><td>{$mhs['nama']}</td><td>{$mhs['email']}</td><td>{$mhs['prodi_id']}</td></tr>";
                        }
                        echo '</tbody></table>';
                    } else {
                        echo "<p>No data available.</p>";
                    }
                }
                ?>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
