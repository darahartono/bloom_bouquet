<?php
session_start();
require_once __DIR__ . "/../config/koneksi.php";
/** @var mysqli $conn */

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['simpan'])) {

    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $harga = $_POST['harga'];
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $stok = $_POST['stok'];
    $gambar = mysqli_real_escape_string($conn, $_POST['gambar']);

    $query = mysqli_query($conn, "INSERT INTO produk
        (nama, deskripsi, harga, kategori, stok, gambar)
        VALUES
        ('$nama', '$deskripsi', '$harga', '$kategori', '$stok', '$gambar')");

    if ($query) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>

<body>

<h1>Tambah Produk</h1>

<form method="POST">

    <p>
        <label>Nama Produk</label><br>
        <input type="text" name="nama" required>
    </p>

    <p>
        <label>Deskripsi</label><br>
        <textarea name="deskripsi" required></textarea>
    </p>

    <p>
        <label>Harga</label><br>
        <input type="number" name="harga" required>
    </p>

    <p>
        <label>Kategori</label><br>
        <input type="text" name="kategori" required>
    </p>

    <p>
        <label>Stok</label><br>
        <input type="number" name="stok" required>
    </p>

    <p>
        <label>Nama File Gambar</label><br>
        <input type="text" name="gambar" placeholder="contoh: rose-romance.jpg">
    </p>

    <button type="submit" name="simpan">Simpan Produk</button>

</form>

<br>

<a href="index.php">Kembali</a>

</body>
</html>