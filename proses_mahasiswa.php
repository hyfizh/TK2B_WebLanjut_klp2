<?php
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tgllahir = $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tgllahir'];
    $jenis = $_POST['jenis'];
    $email = $_POST['email'];
    $hobi = isset($_POST['hobi']) ? implode(',', $_POST['hobi']) : '';
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];

    try {
        $stmt = $db->prepare("INSERT INTO mahasiswa (nim, nama, tgllahir, jenis, email, hobi, nohp, alamat) 
                              VALUES (:nim, :nama, :tgllahir, :jenis, :email, :hobi, :nohp, :alamat)");
        $stmt->execute([
            ':nim' => $nim,
            ':nama' => $nama,
            ':tgllahir' => $tgllahir,
            ':jenis' => $jenis,
            ':email' => $email,
            ':hobi' => $hobi,
            ':nohp' => $nohp,
            ':alamat' => $alamat
        ]);
        header("Location: index.php?p=mhs");
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

if ($_GET['proses'] == 'update') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tgllahir = $_POST['tahun'] . '-' . $_POST['bulan'] . '-' . $_POST['tgllahir'];
    $jenis = $_POST['jekel'];
    $email = $_POST['email'];
    $hobi = isset($_POST['hobi']) ? implode(',', $_POST['hobi']) : '';
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];

    try {
        $stmt = $db->prepare("UPDATE mahasiswa 
                              SET nama = :nama, 
                                  tgllahir = :tgllahir, 
                                  jenis = :jenis, 
                                  email = :email, 
                                  hobi = :hobi, 
                                  nohp = :nohp, 
                                  alamat = :alamat 
                              WHERE nim = :nim");
        $stmt->execute([
            ':nim' => $nim,
            ':nama' => $nama,
            ':tgllahir' => $tgllahir,
            ':jenis' => $jenis,
            ':email' => $email,
            ':hobi' => $hobi,
            ':nohp' => $nohp,
            ':alamat' => $alamat
        ]);
        header("Location: index.php?p=mhs");
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

if ($_GET['proses'] == 'delete') {
    $nim = $_GET['nim'];

    try {
        $stmt = $db->prepare("DELETE FROM mahasiswa WHERE nim = :nim");
        $stmt->execute([':nim' => $nim]);
        header("Location: index.php?p=mhs");
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

?>
