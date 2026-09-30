<?php
require_once __DIR__ . '/config/koneksi.php';

/*
|--------------------------------------------------------------------------
| Fungsi untuk menentukan gambar produk
|--------------------------------------------------------------------------
| Database boleh menyimpan:
| - money-bloom.jpg
| - money-bloom.png
| - assets/images/money-bloom.jpg
| - money-bloom
|
| Sistem akan mencari file yang sesuai di assets/images/
|--------------------------------------------------------------------------
*/

function getProductImage($gambar)
{
    $folder = __DIR__ . '/assets/images/';

    // Jika database kosong
    if (empty($gambar)) {
        return 'assets/images/hero-bouquet.png';
    }

    // Bersihkan nama file
    $gambar = trim($gambar);
    $gambar = str_replace('\\', '/', $gambar);

    // Jika database menyimpan URL gambar
    if (filter_var($gambar, FILTER_VALIDATE_URL)) {
        return $gambar;
    }

    // Ambil nama file saja
    $namaFile = basename($gambar);

    // Cek apakah nama file sudah memiliki ekstensi
    $pathFile = $folder . $namaFile;

    if (file_exists($pathFile)) {
        return 'assets/images/' . rawurlencode($namaFile);
    }

    // Jika database hanya menyimpan nama tanpa ekstensi
    $ekstensi = ['jpg', 'jpeg', 'png', 'webp'];

    foreach ($ekstensi as $ext) {
        $namaDenganExt = $namaFile . '.' . $ext;

        if (file_exists($folder . $namaDenganExt)) {
            return 'assets/images/' . rawurlencode($namaDenganExt);
        }
    }

    // Jika gambar tidak ditemukan, gunakan gambar default
    return 'assets/images/hero-bouquet.png';
}


/*
|--------------------------------------------------------------------------
| Pencarian Produk
|--------------------------------------------------------------------------
*/

$keyword = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($keyword !== '') {

    $keywordSafe = $conn->real_escape_string($keyword);

    $query = "
        SELECT *
        FROM produk
        WHERE nama LIKE '%$keywordSafe%'
        OR kategori LIKE '%$keywordSafe%'
        ORDER BY id DESC
    ";

} else {

    $query = "
        SELECT *
        FROM produk
        ORDER BY id DESC
    ";
}

$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Koleksi Bouquet - Bloom Bouquet</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar">

    <div class="nav-container">

        <a href="index.php" class="logo">
            Bloom Bouquet
        </a>

        <div class="nav-menu">

            <a href="index.php">
                Home
            </a>

            <a href="produk.php" class="active">
                Collections
            </a>

            <a href="tentang.php">
                About
            </a>

            <a href="kontak.php">
                Contact
            </a>

        </div>

    </div>

</nav>


<!-- =========================
     PAGE HEADER
========================= -->

<section class="page-header">

    <div class="container">

        <p class="subtitle">
            OUR COLLECTION
        </p>

        <h1>
            Koleksi Buket
        </h1>

        <p>
            Temukan buket bunga yang sesuai untuk setiap momen spesial.
        </p>

    </div>

</section>


<!-- =========================
     PRODUCT SECTION
========================= -->

<section class="product-section">

    <div class="container">


        <!-- SEARCH -->

        <div class="search-box">

            <form action="produk.php" method="GET">

                <input
                    type="text"
                    name="search"
                    placeholder="Cari buket..."
                    value="<?php echo htmlspecialchars($keyword); ?>"
                >

                <button type="submit">
                    Cari
                </button>

            </form>

        </div>


        <!-- PRODUCT GRID -->

        <div class="product-grid">

            <?php if ($result && $result->num_rows > 0): ?>

                <?php while ($produk = $result->fetch_assoc()): ?>

                    <?php
                        $gambar = getProductImage($produk['gambar']);
                    ?>

                    <div class="product-card">

                        <!-- GAMBAR PRODUK -->

                        <div class="product-image">

                            <img
                                src="<?php echo htmlspecialchars($gambar); ?>"
                                alt="<?php echo htmlspecialchars($produk['nama']); ?>"
                            >

                        </div>


                        <!-- INFORMASI PRODUK -->

                        <div class="product-info">

                            <p class="product-category">

                                <?php
                                    echo htmlspecialchars($produk['kategori']);
                                ?>

                            </p>


                            <h2>

                                <?php
                                    echo htmlspecialchars($produk['nama']);
                                ?>

                            </h2>


                            <p class="product-description">

                                <?php

                                $deskripsi = $produk['deskripsi'];

                                if (strlen($deskripsi) > 100) {
                                    echo htmlspecialchars(
                                        substr($deskripsi, 0, 100)
                                    ) . '...';
                                } else {
                                    echo htmlspecialchars($deskripsi);
                                }

                                ?>

                            </p>


                            <div class="product-bottom">

                                <span class="product-price">

                                    Rp
                                    <?php
                                        echo number_format(
                                            $produk['harga'],
                                            0,
                                            ',',
                                            '.'
                                        );
                                    ?>

                                </span>


                                <a
                                    href="detail-produk.php?id=<?php echo $produk['id']; ?>"
                                    class="detail-button"
                                >
                                    Lihat Detail →
                                </a>

                            </div>

                        </div>

                    </div>

                <?php endwhile; ?>


            <?php else: ?>

                <!-- JIKA PRODUK TIDAK ADA -->

                <div class="empty-product">

                    <h2>
                        Produk tidak ditemukan
                    </h2>

                    <p>
                        Maaf, produk yang kamu cari belum tersedia.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer class="footer">

    <div class="container">

        <p>
            © 2026 Bloom Bouquet. All Rights Reserved.
        </p>

    </div>

</footer>


</body>

</html>