<?php
session_start();
require_once __DIR__ . "/../config/koneksi.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Produk - Bloomé Bouquet</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f8f1f3;
        }

        .container {
            width: 90%;
            margin: 40px auto;
        }

        h1 {
            color: #7b1e2b;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 7px;
            color: white;
            background: #7b1e2b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #7b1e2b;
            color: white;
        }

        img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }

        .edit {
            color: #7b1e2b;
            text-decoration: none;
            margin-right: 8px;
        }

        .hapus {
            color: #b00020;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top">
        <h1>Kelola Produk</h1>

        <div>
            <a class="btn" href="tambah.php">+ Tambah Produk</a>
            <a class="btn" href="../index.php">Dashboard</a>
        </div>
    </div>

    <table>

        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while ($produk = mysqli_fetch_assoc($query)):
        ?>

        <tr>

            <td><?= $no++; ?></td>

            <td>
                <?php if (!empty($produk['gambar'])): ?>
                    <img src="../../assets/images/<?= $produk['gambar']; ?>">
                <?php else: ?>
                    Tidak ada gambar
                <?php endif; ?>
            </td>

            <td><?= htmlspecialchars($produk['nama']); ?></td>

            <td><?= htmlspecialchars($produk['deskripsi']); ?></td>

            <td>Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></td>

            <td><?= htmlspecialchars($produk['kategori']); ?></td>

            <td><?= $produk['stok']; ?></td>

            <td>
                <a class="edit" href="edit.php?id=<?= $produk['id']; ?>">Edit</a>

                <a class="hapus"
                   href="hapus.php?id=<?= $produk['id']; ?>"
                   onclick="return confirm('Yakin ingin menghapus produk ini?')">
                   Hapus
                </a>
            </td>

        </tr>

        <?php endwhile; ?>

    </table>

</div>

</body>
</html>