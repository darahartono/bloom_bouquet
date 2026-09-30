<?php

require_once "config/koneksi.php";

$id = isset($_GET['id'])
    ? (int)$_GET['id']
    : 0;

$query = mysqli_query(
    $conn,
    "SELECT * FROM produk WHERE id = $id"
);

$produk = mysqli_fetch_assoc($query);

if (!$produk) {
    die("Produk tidak ditemukan.");
}


/* =========================================
   MENCARI GAMBAR PRODUK
   BERLAKU UNTUK SEMUA PRODUK
========================================= */

$gambarProduk = '';

$folderGambar = __DIR__ . '/assets/images/';

$namaDatabase = pathinfo(
    $produk['gambar'],
    PATHINFO_FILENAME
);

$namaDatabase = strtolower(
    str_replace(
        ['-', '_', ' '],
        '',
        $namaDatabase
    )
);

$daftarGambar = glob($folderGambar . '*');

foreach ($daftarGambar as $file) {

    if (!is_file($file)) {
        continue;
    }

    $namaFile = pathinfo(
        $file,
        PATHINFO_FILENAME
    );

    $namaFile = strtolower(
        str_replace(
            ['-', '_', ' '],
            '',
            $namaFile
        )
    );

    if ($namaFile === $namaDatabase) {

        $gambarProduk = basename($file);

        break;
    }
}


/* =========================================
   PESAN WHATSAPP
========================================= */

$nomorWhatsApp = "628xxxxxxxxxx";

$pesanWhatsApp =
    "Halo Bloom Bouquet, saya ingin memesan " .
    $produk['nama'] .
    " dengan harga Rp " .
    number_format(
        $produk['harga'],
        0,
        ',',
        '.'
    ) .
    ".";

$linkWhatsApp =
    "https://wa.me/" .
    $nomorWhatsApp .
    "?text=" .
    urlencode($pesanWhatsApp);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($produk['nama']); ?>
        - Bloom Bouquet
    </title>


    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: Arial, Helvetica, sans-serif;

            color: #3d3035;

            background: #fffafb;
        }


        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            width: 100%;

            height: 75px;

            display: flex;

            align-items: center;

            background: rgba(255, 255, 255, 0.97);

            border-bottom: 1px solid #eee1e5;
        }


        .nav-container {
            width: 90%;

            max-width: 1200px;

            margin: auto;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .logo {
            font-family: Georgia, serif;

            font-size: 25px;

            font-weight: bold;

            color: #8e536d;

            text-decoration: none;
        }


        .nav-menu {
            display: flex;

            align-items: center;

            gap: 35px;
        }


        .nav-menu a {
            color: #4b3b42;

            text-decoration: none;

            font-size: 15px;

            transition: 0.3s;
        }


        .nav-menu a:hover {
            color: #a75b7b;
        }


        /* =========================
           DETAIL SECTION
        ========================= */

        .detail-section {
            min-height: calc(100vh - 135px);

            display: flex;

            align-items: center;

            padding: 70px 0;

            background-image:
                linear-gradient(
                    to right,
                    rgba(255, 255, 255, 0.96),
                    rgba(255, 255, 255, 0.82)
                ),
                url("assets/images/hero-bouquet.png");

            background-size: cover;

            background-position: center;
        }


        .detail-container {
            width: 90%;

            max-width: 1100px;

            margin: auto;

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 70px;

            align-items: center;
        }


        /* =========================
           GAMBAR PRODUK
        ========================= */

        .detail-image {
            width: 100%;

            height: 500px;

            background: #f8edf1;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 10px 30px rgba(80, 50, 60, 0.12);
        }


        .detail-image img {
            width: 100%;

            height: 100%;

            display: block;

            object-fit: cover;
        }


        .image-not-found {
            width: 100%;

            height: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            text-align: center;

            padding: 30px;

            color: #8e536d;

            font-size: 14px;
        }


        /* =========================
           INFORMASI PRODUK
        ========================= */

        .detail-content {
            padding: 10px 0;
        }


        .product-category {
            font-size: 13px;

            text-transform: uppercase;

            letter-spacing: 3px;

            color: #a75b7b;

            font-weight: bold;

            margin-bottom: 15px;
        }


        .detail-content h1 {
            font-family: Georgia, serif;

            font-size: 48px;

            line-height: 1.1;

            color: #563846;

            margin-bottom: 20px;
        }


        .price {
            font-size: 23px;

            font-weight: bold;

            color: #8e536d;

            margin-bottom: 20px;
        }


        .line {
            width: 60px;

            height: 2px;

            background: #a75b7b;

            margin-bottom: 25px;
        }


        .description {
            max-width: 520px;

            font-size: 16px;

            line-height: 1.8;

            color: #5c5056;

            margin-bottom: 22px;
        }


        .stock {
            font-size: 15px;

            color: #5c5056;

            margin-bottom: 30px;
        }


        /* =========================
           TOMBOL
        ========================= */

        .detail-actions {
            display: flex;

            align-items: center;

            gap: 15px;

            flex-wrap: wrap;
        }


        .order-button {
            display: inline-block;

            padding: 13px 24px;

            background: #a75b7b;

            border: 1px solid #a75b7b;

            border-radius: 8px;

            color: white;

            text-decoration: none;

            font-size: 14px;

            font-weight: bold;

            transition: 0.3s;
        }


        .order-button:hover {
            background: #8e536d;

            border-color: #8e536d;
        }


        .back-button {
            display: inline-block;

            padding: 13px 22px;

            border: 1px solid #a75b7b;

            border-radius: 8px;

            color: #a75b7b;

            text-decoration: none;

            font-size: 14px;

            transition: 0.3s;
        }


        .back-button:hover {
            background: #a75b7b;

            color: white;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            height: 60px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: rgba(255, 255, 255, 0.97);

            border-top: 1px solid #eee1e5;

            color: #75666c;

            font-size: 13px;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {

            .navbar {
                height: auto;

                padding: 20px 0;
            }


            .nav-container {
                flex-direction: column;

                gap: 15px;
            }


            .nav-menu {
                gap: 18px;

                flex-wrap: wrap;

                justify-content: center;
            }


            .detail-section {
                padding: 50px 0;
            }


            .detail-container {
                grid-template-columns: 1fr;

                gap: 40px;
            }


            .detail-image {
                height: 400px;
            }


            .detail-content h1 {
                font-size: 38px;
            }


            .detail-actions {
                flex-direction: column;

                align-items: flex-start;
            }

        }

    </style>

</head>


<body>


    <!-- =========================
         NAVBAR
    ========================= -->

    <nav class="navbar">

        <div class="nav-container">

            <a
                href="index.php"
                class="logo"
            >
                Bloom Bouquet
            </a>


            <div class="nav-menu">

                <a href="index.php">
                    Home
                </a>

                <a href="produk.php">
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
         DETAIL PRODUK
    ========================= -->

    <section class="detail-section">

        <div class="detail-container">


            <!-- GAMBAR PRODUK -->

            <div class="detail-image">

                <?php if (!empty($gambarProduk)): ?>

                    <img
                        src="assets/images/<?= rawurlencode($gambarProduk); ?>"
                        alt="<?= htmlspecialchars($produk['nama']); ?>"
                    >

                <?php else: ?>

                    <div class="image-not-found">

                        Gambar produk tidak ditemukan.

                    </div>

                <?php endif; ?>

            </div>


            <!-- INFORMASI PRODUK -->

            <div class="detail-content">

                <p class="product-category">

                    <?= htmlspecialchars(
                        $produk['kategori']
                    ); ?>

                </p>


                <h1>

                    <?= htmlspecialchars(
                        $produk['nama']
                    ); ?>

                </h1>


                <div class="price">

                    Rp <?= number_format(
                        $produk['harga'],
                        0,
                        ',',
                        '.'
                    ); ?>

                </div>


                <div class="line"></div>


                <p class="description">

                    <?= nl2br(
                        htmlspecialchars(
                            $produk['deskripsi']
                        )
                    ); ?>

                </p>


                <p class="stock">

                    <strong>
                        Stok tersedia:
                    </strong>

                    <?= $produk['stok']; ?>

                </p>


                <!-- TOMBOL -->

                <div class="detail-actions">

                    <a
                        href="<?= $linkWhatsApp; ?>"
                        class="order-button"
                        target="_blank"
                    >
                        💬 Pesan Sekarang
                    </a>


                    <a
                        href="produk.php"
                        class="back-button"
                    >
                        ← Kembali ke Collections
                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer>

        © 2026 Bloom Bouquet. All Rights Reserved.

    </footer>


</body>

</html>