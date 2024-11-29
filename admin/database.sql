-- Membuat database pdo_kelompok2 jika belum ada
CREATE DATABASE IF NOT EXISTS pdo_kelompok2;
USE pdo_kelompok2;

-- Membuat tabel prodi
CREATE TABLE IF NOT EXISTS prodi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_prodi VARCHAR(100) NOT NULL,
    jenjang_studi ENUM('D-2', 'D-3', 'D-4', 'S1') NOT NULL
);

-- Membuat tabel dosen
CREATE TABLE IF NOT EXISTS dosenn (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nip VARCHAR(20) NOT NULL,
    nama_dosen VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    prodi_id INT NOT NULL,  -- Mengacu pada tabel prodi
    notelp VARCHAR(20) NOT NULL,
    alamat TEXT NOT NULL,
    CONSTRAINT fk_prodi_id FOREIGN KEY (prodi_id) REFERENCES prodi(id)  -- Relasi ke tabel prodi
);

-- Membuat tabel mahasiswa
CREATE TABLE IF NOT EXISTS mahasiswa (
    nim VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    tgllahir DATE NOT NULL,
    jenis ENUM('L', 'P') NOT NULL,
    email VARCHAR(100) NOT NULL,
    hobi TEXT,
    nohp VARCHAR(20) NOT NULL,
    alamat TEXT NOT NULL
);
