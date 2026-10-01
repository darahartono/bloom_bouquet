<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin/login.php");
    exit;
}

require_once "config/koneksi.php";

$query = mysqli_query(
    $conn,
    "SELECT * FROM produk ORDER BY id DESC LIMIT 4"
);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bloom Bouquet</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>

        /* Tombol Logout */
        .logout-btn {
            display: inline-block;
            padding: 8px 16px;

            background-color: #800020;
            color: white !important;

            text-decoration: none;

            border-radius: 6px;

            font-size: 13px;
            font-weight: 500;

            margin-left: 10px;

            transition: 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #5c0015;
            color: white !important;

            transform: translateY(-1px);
        }

    </style>

</head>

<body>

    <nav class="navbar">

        <div class="nav-container">

            <a href="index.php" class="logo">
                Bloom Bouquet
            </a>

            <div class="nav-menu">

                <a href="index.php" class="active">
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

                <!-- TOMBOL LOGOUT -->
                <a href="admin/logout.php" class="logout-btn">
                    Logout
                </a>

            </div>

        </div>

    </nav>


    <section class="hero">

        <div class="hero-content">

            <p>
                SIGNATURE BOUQUETS
            </p>

            <h1>
                The Bouquet<br>
                Edit
            </h1>

            <span>
                Buket bunga elegan untuk memberikan kesan
                istimewa pada setiap momen.
            </span>

            <a href="produk.php" class="btn">
                Shop Now →
            </a>

        </div>

    </section>


    <section class="section">

        <div class="section-title">

            <p>
                OUR COLLECTION
            </p>

            <h2>
                Koleksi Buket
            </h2>

        </div>


        <div class="product-grid">

            <?php while ($row = mysqli_fetch_assoc($query)): ?>

                <div class="product-card">

                    <?php if (!empty($row['gambar'])): ?>

                        <img
                            src="assets/images/<?= htmlspecialchars($row['gambar']); ?>"
                            alt="<?= htmlspecialchars($row['nama']); ?>"
                        >

                    <?php endif; ?>


                    <div class="product-info">

                        <h3>
                            <?= htmlspecialchars($row['nama']); ?>
                        </h3>

                        <p>
                            Rp <?= number_format(
                                $row['harga'],
                                0,
                                ',',
                                '.'
                            ); ?>
                        </p>

                        <a href="detail_produk.php?id=<?= $row['id']; ?>">
                            View Detail →
                        </a>

                    </div>

                </div>

            <?php endwhile; ?>

        </div>


        <a href="produk.php" class="btn">
            View All Collections →
        </a>

    </section>


    <footer>

        © 2026 Bloom Bouquet. All Rights Reserved.

    </footer>


</body>

</html>