<?php

session_start();
require_once __DIR__ . "/../config/koneksi.php";

$error = "";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM admin 
         WHERE email = '$email' 
         AND password = '$password'"
    );

    if (mysqli_num_rows($query) > 0) {

        $admin = mysqli_fetch_assoc($query);

        $_SESSION['admin'] = $admin['id'];
        $_SESSION['name'] = $admin['name'];

        header("Location: index.php");
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

    <title>Login Admin - Bloomé Bouquet</title>

</head>

<body>

    <h1>Bloomé Bouquet</h1>

    <h2>Login Admin</h2>

    <?php if ($error != "") { ?>

        <p><?php echo $error; ?></p>

    <?php } ?>

    <form method="POST">

        <label>Email</label>
        <br>

        <input 
            type="email" 
            name="email" 
            required
        >

        <br><br>

        <label>Password</label>
        <br>

        <input 
            type="password" 
            name="password" 
            required
        >

        <br><br>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</body>

</html>