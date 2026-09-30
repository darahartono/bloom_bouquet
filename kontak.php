<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kontak - Bloom Bouquet</title>

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

            background: rgba(255, 255, 255, 0.95);

            border-bottom: 1px solid #eee1e5;

            position: relative;
            z-index: 10;
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

        .nav-menu a:hover,
        .nav-menu a.active {
            color: #a75b7b;
        }


        /* =========================
           CONTACT SECTION
        ========================= */

        .contact-section {
            min-height: calc(100vh - 135px);

            display: flex;
            align-items: center;

            background-image:
                linear-gradient(
                    to right,
                    rgba(255, 255, 255, 0.97) 0%,
                    rgba(255, 255, 255, 0.93) 42%,
                    rgba(255, 255, 255, 0.45) 100%
                ),
                url("assets/images/hero-bouquet.png");

            background-size: cover;

            background-position: center;

            padding: 80px 0;
        }


        /* =========================
           CONTAINER
        ========================= */

        .contact-container {
            width: 90%;
            max-width: 1100px;

            margin: auto;
        }


        /* =========================
           CONTENT
        ========================= */

        .contact-content {
            width: 58%;

            text-align: left;
        }


        /* =========================
           LABEL
        ========================= */

        .contact-label {
            font-size: 13px;

            letter-spacing: 4px;

            color: #a75b7b;

            font-weight: bold;

            margin-bottom: 15px;
        }


        /* =========================
           TITLE
        ========================= */

        .contact-content h1 {
            font-family: Georgia, serif;

            font-size: 52px;

            line-height: 1.1;

            color: #563846;

            margin-bottom: 25px;
        }


        /* =========================
           DESCRIPTION
        ========================= */

        .contact-description {
            max-width: 650px;

            font-size: 16px;

            line-height: 1.8;

            color: #5c5056;

            margin-bottom: 25px;
        }


        /* =========================
           CONTACT INFORMATION
        ========================= */

        .contact-info {
            margin-top: 10px;
        }


        .contact-item {
            margin-bottom: 20px;
        }


        .contact-item h3 {
            font-family: Georgia, serif;

            font-size: 18px;

            color: #563846;

            margin-bottom: 4px;
        }


        .contact-item p {
            font-size: 15px;

            line-height: 1.6;

            color: #5c5056;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            height: 60px;

            display: flex;

            justify-content: center;

            align-items: center;

            background: rgba(255, 255, 255, 0.95);

            border-top: 1px solid #eee1e5;

            color: #75666c;

            font-size: 13px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 700px) {

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

            .contact-section {
                min-height: calc(100vh - 150px);

                background-position: 65% center;

                padding: 60px 0;
            }

            .contact-content {
                width: 100%;
            }

            .contact-content h1 {
                font-size: 38px;
            }

            .contact-description {
                font-size: 15px;
            }

        }

    </style>

</head>


<body>


    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="nav-container">

            <a href="index.php" class="logo">
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

                <a href="kontak.php" class="active">
                    Contact
                </a>

            </div>

        </div>

    </nav>


    <!-- CONTACT -->

    <section class="contact-section">

        <div class="contact-container">

            <div class="contact-content">

                <div class="contact-label">
                    GET IN TOUCH
                </div>

                <h1>
                    Hubungi Kami
                </h1>

                <p class="contact-description">
                    Ingin memesan buket atau bertanya mengenai
                    produk kami? Silakan hubungi Bloom Bouquet
                    melalui kontak berikut.
                </p>


                <div class="contact-info">

                    <div class="contact-item">

                        <h3>
                            WhatsApp
                        </h3>

                        <p>
                            08xxxxxxxxxx
                        </p>

                    </div>


                    <div class="contact-item">

                        <h3>
                            Instagram
                        </h3>

                        <p>
                            @bloom.bouquet
                        </p>

                    </div>


                    <div class="contact-item">

                        <h3>
                            Alamat
                        </h3>

                        <p>
                             Situbondo, Jawa Timur, Indonesia.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->

    <footer>

        © 2026 Bloom Bouquet. All Rights Reserved.

    </footer>


</body>

</html>