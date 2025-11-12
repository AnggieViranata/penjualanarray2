<?php
session_start();

// Kalau sudah login langsung ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

// variabel error
$error = "";

// cek apakah tombol login ditekan
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == "admin" && $pass == "1234") {
        // login benar
        $_SESSION['username'] = $user;
        $_SESSION['role'] = "Dosen";
        header("Location: dashboard.php");
        exit;
    } else {
        // login salah
        $error = "⚠️ Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #a6c0fe, #f68084);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            width: 340px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="reset"] {
            background-color: #f44336;
            margin-left: 10px;
        }
        button:hover {
            opacity: 0.9;
        }

        /* kotak error */
        .error-box {
            background-color: #ffe6e6;
            border: 1px solid #ff4d4d;
            color: #d8000c;
            padding: 10px;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 14px;
            animation: fadein 0.3s ease;
        }

        @keyframes fadein {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        footer {
            margin-top: 15px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login Sistem Penjualan</h2>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit" name="login">Login</button>
        <button type="reset">Batal</button>
    </form>

    <!-- Pesan error muncul hanya setelah form dikirim & login gagal -->
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($error)) : ?>
        <div class="error-box"><?php echo $error; ?></div>
    <?php endif; ?>

    <footer>© 2025 Sistem Penjualan - POLGAN</footer>
</div>

</body>
</html>
