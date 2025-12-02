<?php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}


// ===========================
// INISIALISASI DATA
// ===========================
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

// Tambah barang
if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $harga * $jumlah;

    $_SESSION['keranjang'][] = [
        'kode' => $kode,
        'nama' => $nama,
        'harga' => $harga,
        'jumlah' => $jumlah,
        'total' => $total
    ];
}

// Reset keranjang
if (isset($_POST['reset'])) {
    $_SESSION['keranjang'] = [];
}

// Hitung total
$grandtotal = 0;
foreach ($_SESSION['keranjang'] as $item) {
    $grandtotal += $item['total'];
}

// Diskon
if ($grandtotal <= 50000) {
    $diskon_persen = 5;
} elseif ($grandtotal <= 100000) {
    $diskon_persen = 10;
} else {
    $diskon_persen = 20;
}


$diskon_rp = ($diskon_persen / 100) * $grandtotal;
$total_bayar = $grandtotal - $diskon_rp;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 40px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 15px;
            letter-spacing: 2px;
        }

        .box {
    width: 800px;
    margin: 30px auto;
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.1);
}


input {
    width:100%;
    padding:12px;
    border-radius:8px;
    border:1px solid #d1d5db;
    margin-bottom:18px;
 }

select {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #d1d5db;
    margin-bottom: 18px;
    background: white;
}




label {
     font-weight:600;
      margin-bottom: 5px;
    display: block;
     }

    .btn-primary {
    background: #1d4ed8;
    color: white;
    padding: 10px 18px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.btn-secondary {
    background: #e5e7eb;
    color: #333;
    padding: 10px 18px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
}

.reset-btn {
    margin-left:500px;
    padding:10px 18px;
    background:#e74c3c;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
}


        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand .logo {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #4a7df2, #6aa6ff);
            color: white;
            border-radius: 10px;
            font-size: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 700;
        }

        .brand-small {
            font-size: 13px;
            color: #fff;
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
    <div class="brand">
        <div class="logo">PM</div>
        <div>
            <div class="brand-name">--POLGAN MART--</div>
            <div class="brand-small">Sistem Penjualan Sederhana</div>
        </div>
    </div>

    <div class="user-panel">
        <p>Selamat datang, <strong><?php echo $_SESSION['username']; ?></strong>!</p>
        <small>Role: <?php echo $_SESSION['role']; ?></small><br>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    </header>

<div class="box">
    <form method="post">
 <label>Kode Barang</label>
    <select id="kodeBarang" name="kode" class="form-control" required>
        <option value="">Pilih Kode Barang</option>
        <option value="BRG001" data-nama="Sabun Mandi" data-harga="15000">BRG001 - Sabun Mandi</option>
        <option value="BRG002" data-nama="Sikat Gigi" data-harga="7000">BRG002 - Sikat Gigi</option>
        <option value="BRG003" data-nama="Pasta Gigi" data-harga="12000">BRG003 - Pasta Gigi</option>
        <option value="BRG004" data-nama="Shampoo" data-harga="18000">BRG004 - Shampoo</option>
        <option value="BRG005" data-nama="Handuk" data-harga="25000">BRG005 - Handuk</option>
    </select>

    <label>Nama Barang</label>
    <input type="text" id="namaBarang" name="nama" readonly>

    <label>Harga</label>
    <input type="number" id="hargaBarang" name="harga" readonly>

    <label>Jumlah</label>
    <input type="number" name="jumlah" placeholder="Masukkan Jumlah" required>

    <button type="submit" name="tambah" class="btn-primary">Tambahkan</button>
    <button type="reset" class="btn-secondary">Batal</button>
</form>


<!-- Tambahkan include penjualan -->
    <?php include 'penjualan.php'; ?>
</div>

</table>

 <form method="post">
        <button type="submit" name="reset" class="reset-btn">Kosongkan Keranjang</button>
    </form>


<script>
document.getElementById("kodeBarang").addEventListener("change", function () {
    let selected = this.options[this.selectedIndex];

    document.getElementById("namaBarang").value = selected.getAttribute("data-nama") || "";
    document.getElementById("hargaBarang").value = selected.getAttribute("data-harga") || "";
});
</script>


<footer>
    © 2025 Sistem Penjualan - POLGAN
</footer>

</body>
</html>
