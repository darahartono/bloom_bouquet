<?php

session_start();

require_once __DIR__ . "/../config/koneksi.php";

/* 
   Kalau sudah login, langsung ke Home
*/
if (isset($_SESSION['admin'])) {
    header("Location: ../index.php");
    exit;
}

$error = "";


/* =========================
   PROSES LOGIN
   ========================= */

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = mysqli_query(
        $conn,
        "SELECT * FROM admin 
         WHERE email = '$email' 
         AND password = '$password'"
    );

    if ($query && mysqli_num_rows($query) > 0) {

        $admin = mysqli_fetch_assoc($query);

        $_SESSION['admin'] = $admin['id'];
        $_SESSION['name'] = $admin['name'];

        /* Setelah login masuk ke HOME */
        header("Location: ../index.php");
        exit;

    } else {

        $error = "Email atau password salah.";

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Bloom Bouquet</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

            min-height: 100vh;

            background: #800020;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        .login-box {
            width: 100%;
            max-width: 400px;

            background: #ffffff;

            padding: 40px;

            border-radius: 12px;

            box-shadow:
                0 10px 35px rgba(0, 0, 0, 0.25);
        }

        .logo {
            text-align: center;

            font-family: Georgia, serif;

            font-size: 32px;

            font-weight: bold;

            color: #800020;

            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;

            color: #777;

            font-size: 14px;

            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;

            color: #800020;

            font-size: 14px;

            font-weight: bold;

            margin-bottom: 7px;
        }

        input {
            width: 100%;

            padding: 12px 14px;

            border: 1px solid #d8aab5;

            border-radius: 6px;

            outline: none;

            font-size: 14px;
        }

        input:focus {
            border-color: #800020;

            box-shadow:
                0 0 0 2px rgba(128, 0, 32, 0.1);
        }

        .login-button {
            width: 100%;

            padding: 13px;

            background: #800020;

            color: #ffffff;

            border: none;

            border-radius: 6px;

            font-size: 15px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;
        }

        .login-button:hover {
            background: #5c0015;
        }

        .error {
            background: #f8d7da;

            color: #842029;

            padding: 10px;

            border-radius: 6px;

            font-size: 13px;

            margin-bottom: 20px;

            text-align: center;
        }

    </style>

</head>


<body>

    <div class="login-box">

        <div class="logo">
            Bloom Bouquet
        </div>

        <p class="subtitle">
            Silakan login untuk masuk ke website
        </p>


        <?php if ($error != ""): ?>

            <div class="error">
                <?= htmlspecialchars($error); ?>
            </div>

        <?php endif; ?>


        <form method="POST">

            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Masukkan email"
                    required
                >

            </div>


            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

            </div>


            <button
                type="submit"
                name="login"
                class="login-button"
            >
                Login
            </button>

        </form>

    </div>

</body>

</html>