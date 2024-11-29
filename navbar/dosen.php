<?php
include('koneksi.php');

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':
?>
    <div class="container">
        <h2>Data Dosen</h2>
        <a href="dosen.php?aksi=input" class="btn btn-primary mb-3"><i class="bi bi-file-plus"></i> Tambah Dosen</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th>Email</th>
                    <th>Prodi ID</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $ambil = mysqli_query($db, "SELECT * FROM dosenn");
                $no = 1;
                while ($data = mysqli_fetch_assoc($ambil)) {
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$data['nip']}</td>
                        <td>{$data['nama_dosen']}</td>
                        <td>{$data['email']}</td>
                        <td>{$data['prodi_id']}</td>
                        <td>{$data['notelp']}</td>
                        <td>{$data['alamat']}</td>
                        <td>
                            <a href='dosen.php?aksi=edit&id={$data['id']}' class='btn btn-success'><i class='bi bi-pen-fill'></i> Edit</a>
                            <a href='dosen.php?aksi=delete&id={$data['id']}' onclick='return confirm(\"Yakin ingin menghapus data?\")' class='btn btn-danger'><i class='bi bi-trash'></i> Hapus</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
        break;

    case 'input':
?>
    <div class="container">
        <h2>Tambah Data Dosen</h2>
        <form action="dosen.php?aksi=insert" method="POST">
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="number" class="form-control" name="nip" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_dosen" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Prodi ID</label>
                <input type="number" class="form-control" name="prodi_id" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="notelp" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
<?php
        break;

    case 'edit':
        $id = $_GET['id'];
        $ambil = mysqli_query($db, "SELECT * FROM dosenn WHERE id='$id'");
        $data = mysqli_fetch_assoc($ambil);
?>
    <div class="container">
        <h2>Edit Data Dosen</h2>
        <form action="dosen.php?aksi=update" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="number" class="form-control" name="nip" value="<?= $data['nip'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_dosen" value="<?= $data['nama_dosen'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Prodi ID</label>
                <input type="number" class="form-control" name="prodi_id" value="<?= $data['prodi_id'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="notelp" value="<?= $data['notelp'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" rows="3" required><?= $data['alamat'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
<?php
        break;

    case 'insert':
        $nip = $_POST['nip'];
        $nama = $_POST['nama_dosen'];
        $email = $_POST['email'];
        $prodi_id = $_POST['prodi_id'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO dosenn (nip, nama_dosen, email, prodi_id, notelp, alamat) 
                  VALUES ('$nip', '$nama', '$email', '$prodi_id', '$notelp', '$alamat')";
        if (mysqli_query($db, $query)) {
            header('Location: dosen.php');
        }
        break;

    case 'update':
        $id = $_POST['id'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama_dosen'];
        $email = $_POST['email'];
        $prodi_id = $_POST['prodi_id'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];

        $query = "UPDATE dosenn SET 
                  nip='$nip', nama_dosen='$nama', email='$email', prodi_id='$prodi_id', notelp='$notelp', alamat='$alamat' 
                  WHERE id='$id'";
        if (mysqli_query($db, $query)) {
            header('Location: dosen.php');
        }
        break;

    case 'delete':
        $id = $_GET['id'];
        $query = "DELETE FROM dosenn WHERE id='$id'";
        if (mysqli_query($db, $query)) {
            header('Location: dosen.php');
        }
        break;
}
?>
