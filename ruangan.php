<?php
// Koneksi ke database menggunakan PDO
include 'admin/koneksi.php';

try {
    $stmt = $db->prepare("SELECT * FROM ruangan");
    $stmt->execute();
    $ruangan = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<h2>Data Ruangan</h2>
<table id="example" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Ruangan</th>
            <th>Nama Ruangan</th>
            <th>Gedung</th>
            <th>Lantai</th>
            <th>Jenis Ruangan</th>
            <th>Kapasitas</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($ruangan as $data) {
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?= htmlspecialchars($data['kode_ruangan']) ?></td>
                <td><?= htmlspecialchars($data['nama_ruangan']) ?></td>
                <td><?= htmlspecialchars($data['gedung']) ?></td>
                <td><?= htmlspecialchars($data['lantai']) ?></td>
                <td><?= htmlspecialchars($data['jenis_ruangan']) ?></td>
                <td><?= htmlspecialchars($data['kapasitas']) ?></td>
                <td><?= htmlspecialchars($data['keterangan']) ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>

<?php
// Koneksi ke database menggunakan PDO
include 'admin/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Ambil data dari form
        $kode_ruangan = $_POST['kode_ruangan'];
        $nama_ruangan = $_POST['nama_ruangan'];
        $gedung = $_POST['gedung'];
        $lantai = $_POST['lantai'];
        $jenis_ruangan = $_POST['jenis_ruangan'];
        $kapasitas = $_POST['kapasitas'];
        $keterangan = $_POST['keterangan'];

        // Query untuk menyimpan data
        $stmt = $db->prepare("INSERT INTO ruangan (kode_ruangan, nama_ruangan, gedung, lantai, jenis_ruangan, kapasitas, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$kode_ruangan, $nama_ruangan, $gedung, $lantai, $jenis_ruangan, $kapasitas, $keterangan]);

        echo "Data berhasil disimpan.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Metode tidak valid.";
}
?>
