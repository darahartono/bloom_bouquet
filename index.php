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

</head>

<body>

    <!-- =========================
         NAVBAR
    ========================== -->

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

                <a href="admin/logout.php" class="logout-btn">
                    Logout
                </a>

            </div>

        </div>

    </nav>


    <!-- =========================
         HERO
    ========================== -->

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


    <!-- =========================
         OUR COLLECTION
    ========================== -->

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
                            Rp
                            <?= number_format(
                                $row['harga'],
                                0,
                                ',',
                                '.'
                            ); ?>
                        </p>

                        <a href="produk/detail-produk.php?id=<?= $row['id']; ?>">
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


    <!-- =========================
         FOOTER
    ========================== -->

    <footer>

        © 2026 Bloom Bouquet. All Rights Reserved.

    </footer>


</body>

</html>