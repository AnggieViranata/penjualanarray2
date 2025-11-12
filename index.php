<?php
session_start();

// Cek apakah user sudah login
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

// Proses login saat form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Login sederhana (username: admin, password: 123)
    if ($username === 'admin' && $password === '123') {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'Dosen';
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Penjualan</title>
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
            width: 320px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
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
        .error {
            color: red;
            margin-top: 10px;
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
    <h2>Form Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Masukkan Username" required><br>
        <input type="password" name="password" placeholder="Masukkan Password" required><br>
        <button type="submit">Login</button>
        <button type="reset">Batal</button>
    </form>
    <div class="error">
        <?php echo $error; ?>
    </div>
    <footer>© 2025 Sistem Penjualan - POLGAN</footer>
</div>

</body>
</html>
