<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - POLGAN MART</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 22px;
            letter-spacing: 2px;
        }
        .container {
            background: #fff;
            width: 80%;
            margin: 40px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        h2 {
            text-align: center;
            color: #222;
            margin-bottom: 10px;
        }
        .user-info {
            text-align: center;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .user-info span {
            font-weight: bold;
            color: #2c3e50;
        }
        a.logout {
            display: inline-block;
            text-decoration: none;
            background: #e74c3c;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
            margin-top: 10px;
            transition: 0.3s;
        }
        a.logout:hover {
            background: #c0392b;
        }
        hr {
            margin: 25px 0;
            border: 0;
            height: 2px;
            background: #333;
        }
        footer {
            text-align: center;
            color: #555;
            font-size: 12px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<header>
    -- POLGAN MART --
</header>

<div class="container">
    <div class="user-info">
        <?php
            echo "<h2>Selamat datang, <span>" . $_SESSION['username'] . "</span>!</h2>";
        ?>
        <p>Role: <span><?php echo $_SESSION['role']; ?></span></p>
        <a href="logout.php" class="logout">Logout</a>
    </div>

    <hr>
<!-- Tambahkan include penjualan -->
    <?php include 'penjualan.php'; ?>
</div>
<footer>
    © 2025 Sistem Penjualan - POLGAN
</footer>

</body>
</html>
