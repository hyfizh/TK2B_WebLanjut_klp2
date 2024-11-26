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
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=mhs">mahasiswa</a>
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
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mahasiswa</a>
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
            <!-- Main content -->
            <main class="col-md-10 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>List Mahasiswa</h2>
                </div>
                <?php
$page = isset($_GET['p']) ? $_GET['p'] : 'home';
switch ($page) {
    case 'home':
        include 'home.php';
        break;
    case 'mhs':
        include 'mahasiswa.php';
        break;
    // ... tambahkan case lain sesuai kebutuhan
}
?>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>