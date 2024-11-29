<?php
include 'koneksi.php';

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menangani proses insert, update, dan delete
    if (isset($_POST['aksi'])) {
        $aksi = $_POST['aksi'];
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $nama_prodi = mysqli_real_escape_string($db, $_POST['nama_prodi']);
        $jenjang_studi = mysqli_real_escape_string($db, $_POST['jenjang_studi']);

        if ($aksi == 'insert') {
            $query = "INSERT INTO prodi (nama_prodi, jenjang_studi) VALUES ('$nama_prodi', '$jenjang_studi')";
            mysqli_query($db, $query);
        } elseif ($aksi == 'update' && $id) {
            $query = "UPDATE prodi SET nama_prodi = '$nama_prodi', jenjang_studi = '$jenjang_studi' WHERE id = '$id'";
            mysqli_query($db, $query);
        } elseif ($aksi == 'delete' && $id) {
            $query = "DELETE FROM prodi WHERE id = '$id'";
            mysqli_query($db, $query);
        }
        header("Location: prodi.php");
        exit();
    }
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="nav-icon fas fa-university"></i> Prodi</h1>
</div>

<?php
switch ($aksi) {
    case 'list':
?>
<div class="container">
    <div class="row">
        <div class="col-2">
            <a href="prodi.php?aksi=input" class="btn btn-primary mb-3">
                <i class="bi bi-file-plus"></i> Input Prodi Baru
            </a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th>Jenjang Studi</th>
                <th>Aksi</th>
            </tr>
            <?php
            $ambil = mysqli_query($db, "SELECT * FROM prodi");
            $no = 1;
            while ($data = mysqli_fetch_array($ambil)) {
            ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?= $data['nama_prodi'] ?></td>
                <td><?= $data['jenjang_studi'] ?></td>
                <td>
                    <a href="prodi.php?aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success">
                        <i class="bi bi-pen-fill"></i> Edit
                    </a>
                    <form method="POST" action="prodi.php" style="display:inline;">
                        <input type="hidden" name="aksi" value="delete">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apa anda yakin menghapus data?')">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </table>
    </div>
</div>
<?php
        break;

    case 'input':
?>
<div class="container">
    <form action="prodi.php" method="POST">
        <input type="hidden" name="aksi" value="insert">
        <div class="row mb-3">
            <label for="nama_prodi" class="col-sm-2 col-form-label">Nama Prodi</label>
            <div class="col-sm-10">
                <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="jenjang_studi" class="col-sm-2 col-form-label">Jenjang Studi</label>
            <div class="col-sm-10">
                <input type="radio" name="jenjang_studi" value="D-2" checked> D-2 <br>
                <input type="radio" name="jenjang_studi" value="D-3"> D-3 <br>
                <input type="radio" name="jenjang_studi" value="D-4"> D-4 <br>
                <input type="radio" name="jenjang_studi" value="S1"> S1 <br>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Proses</button>
    </form>
</div>
<?php
        break;

    case 'edit':
        $id = $_GET['id'];
        $ambil = mysqli_query($db, "SELECT * FROM prodi WHERE id = '$id'");
        $data_prodi = mysqli_fetch_array($ambil);
?>
<div class="container">
    <form action="prodi.php" method="POST">
        <input type="hidden" name="aksi" value="update">
        <input type="hidden" name="id" value="<?= $data_prodi['id'] ?>">
        <div class="row mb-3">
            <label for="nama_prodi" class="col-sm-2 col-form-label">Nama Prodi</label>
            <div class="col-sm-10">
                <input type="text" name="nama_prodi" id="nama_prodi" class="form-control" value="<?= htmlspecialchars($data_prodi['nama_prodi']); ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="jenjang_studi" class="col-sm-2 col-form-label">Jenjang Studi</label>
            <div class="col-sm-10">
                <input type="radio" name="jenjang_studi" value="D-2" <?= ($data_prodi['jenjang_studi'] == 'D-2') ? 'checked' : ''; ?>> D-2 <br>
                <input type="radio" name="jenjang_studi" value="D-3" <?= ($data_prodi['jenjang_studi'] == 'D-3') ? 'checked' : ''; ?>> D-3 <br>
                <input type="radio" name="jenjang_studi" value="D-4" <?= ($data_prodi['jenjang_studi'] == 'D-4') ? 'checked' : ''; ?>> D-4 <br>
                <input type="radio" name="jenjang_studi" value="S1" <?= ($data_prodi['jenjang_studi'] == 'S1') ? 'checked' : ''; ?>> S1 <br>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Proses</button>
    </form>
</div>
<?php
        break;
}
?>
