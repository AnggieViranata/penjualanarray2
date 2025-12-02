<?php
// ===============================
// Ambil Data dari Session
// ===============================
$pembelian = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];

$grandtotal = 0;
foreach ($pembelian as $item) {
    $grandtotal += $item["total"];
}

// ===============================
// Hitung Diskon
// ===============================
if ($grandtotal <= 50000) {
    $persen = 5;
} elseif ($grandtotal <= 100000) {
    $persen = 10;
} else {
    $persen = 20;
}

$diskon = $grandtotal * ($persen / 100);
$total_setelah_diskon = $grandtotal - $diskon;
?>

<!-- ===============================
Tampilan Nota Pembelian
================================= -->
<div class="nota-box">
    <h3>NOTA PEMBELIAN</h3>
    <p>JL. Veteran No. 194, Deli Serdang</p>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
        <?php if (empty($pembelian)) : ?>
            <tr>
                <td colspan="5" style="text-align:center;">Belum ada barang ditambahkan.</td>
            </tr>
        <?php else : ?>
            <?php foreach ($pembelian as $item): ?>
            <tr>
                <td><?= $item["kode"]; ?></td>
                <td><?= $item["nama"]; ?></td>
                <td>Rp<?= number_format($item["harga"], 0, ',', '.'); ?></td>
                <td><?= $item["jumlah"]; ?></td>
                <td>Rp<?= number_format($item["total"], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>

        <?php if (!empty($pembelian)) : ?>
        <tfoot>
            <tr>
                <th colspan="4" style="text-align:right;">Grand Total :</th>
                <th>Rp<?= number_format($grandtotal, 0, ',', '.'); ?></th>
            </tr>
            <tr>
                <th colspan="4" style="text-align:right;">Diskon (<?= $persen; ?>%) :</th>
                <th>Rp<?= number_format($diskon, 0, ',', '.'); ?></th>
            </tr>
            <tr>
                <th colspan="4" style="text-align:right;">Total Akhir :</th>
                <th>Rp<?= number_format($total_setelah_diskon, 0, ',', '.'); ?></th>
            </tr>
        </tfoot>
        <?php endif; ?>
    </table>
</div>

<style>
    .nota-box {
        background: #fff;
        border: 2px solid #ddd;
        border-radius: 10px;
        padding: 25px;
        margin-top: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .nota-box h3 {
        text-align: center;
        margin-bottom: 5px;
        color: #222;
    }
    .nota-box p {
        text-align: center;
        font-size: 14px;
        color: #555;
        margin: 0;
    }
    .nota-box hr {
        border: 1px dashed #666;
        margin: 10px 0 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: monospace;
        font-size: 15px;
    }
    th, td {
        border: 1px solid #999;
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #FFA07A;
        color: white;
    }
    tfoot th {
        background-color: #A9A9A9;
        text-align: right;
    }
</style>
