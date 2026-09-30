<?php

session_start();
require_once __DIR__ . "/../config/koneksi.php";
/** @var mysqli $conn */

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("ID produk tidak ditemukan.");
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM produk WHERE id = '$id'");

$produk = mysqli_fetch_assoc($query);

if (!$produk) {
    die("Produk tidak ditemukan.");
}

if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];

    $query = mysqli_query($conn, "UPDATE produk SET
        nama = '$nama',
        kategori = '$kategori',
        harga = '$harga',
        stok = '$stok',
        deskripsi = '$deskripsi',
        gambar = '$gambar'
        WHERE id = '$id'
    ");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Edit Produk - Bloomé Bouquet</title>

</head>

<body>

    <h1>Edit Produk</h1>

    <form method="POST">

        <label>Nama Produk</label>
        <br>

        <input 
            type="text"
            name="nama"
            value="<?php echo htmlspecialchars($produk['nama']); ?>"
            required
        >

        <br><br>


        <label>Kategori</label>
        <br>

        <input
            type="text"
            name="kategori"
            value="<?php echo htmlspecialchars($produk['kategori']); ?>"
            required
        >

        <br><br>


        <label>Harga</label>
        <br>

        <input
            type="number"
            name="harga"
            value="<?php echo $produk['harga']; ?>"
            required
        >

        <br><br>


        <label>Stok</label>
        <br>

        <input
            type="number"
            name="stok"
            value="<?php echo $produk['stok']; ?>"
            required
        >

        <br><br>


        <label>Deskripsi</label>
        <br>

        <textarea
            name="deskripsi"
            required
        ><?php echo htmlspecialchars($produk['deskripsi']); ?></textarea>

        <br><br>


        <label>Nama File Gambar</label>
        <br>

        <input
            type="text"
            name="gambar"
            value="<?php echo htmlspecialchars($produk['gambar']); ?>"
        >

        <br><br>


        <button type="submit" name="update">
            Update Produk
        </button>

    </form>

    <br>

    <a href="index.php">Kembali ke Produk</a>

</body>

</html>