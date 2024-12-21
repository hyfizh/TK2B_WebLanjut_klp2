<?php 
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    if (isset($_POST['Proses'])) {
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang_studi = $_POST['jenjang_studi'];

        try {
            $sql = $db->prepare("INSERT INTO prodi (nama_prodi, jenjang_studi) VALUES (:nama_prodi, :jenjang_studi)");
            $sql->bindParam(':nama_prodi', $nama_prodi);
            $sql->bindParam(':jenjang_studi', $jenjang_studi);
            $sql->execute();

            echo "<script>window.location='index.php?p=prodi'</script>";
        } catch (PDOException $e) {
            echo "Data gagal disimpan: " . $e->getMessage();
        }
    }
}

if ($_GET['proses'] == 'update') {
    if (isset($_POST['Proses'])) {
        $id = $_GET['id'];
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang_studi = $_POST['jenjang_studi'];

        try {
            $sql = $db->prepare("UPDATE prodi SET nama_prodi = :nama_prodi, jenjang_studi = :jenjang_studi WHERE id = :id");
            $sql->bindParam(':nama_prodi', $nama_prodi);
            $sql->bindParam(':jenjang_studi', $jenjang_studi);
            $sql->bindParam(':id', $id);
            $sql->execute();

            echo "<script>window.location='index.php?p=prodi'</script>";
        } catch (PDOException $e) {
            echo "Gagal memperbarui data: " . $e->getMessage();
        }
    }
}

if ($_GET['proses'] == 'delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        try {
            $sql = $db->prepare("DELETE FROM prodi WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();

            header("Location:index.php?p=prodi");
        } catch (PDOException $e) {
            echo "Gagal menghapus data: " . $e->getMessage();
        }
    }
}
?>
