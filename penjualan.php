<?php
// ===============================
// Data Produk
// ===============================
$barang = [
    ["B001", "Teh Pucuk", 5000],
    ["B002", "Sukro", 1000],
    ["B003", "Sprite", 4000],
    ["B004", "Chitato", 8000],
    ["B005", "Indomie", 3500]
];
shuffle($barang);

// ===============================
// Hitung Total dan Diskon
// ===============================
$grandtotal = 0;
$pembelian = [];

for ($i = 0; $i < count($barang); $i++) {
    $jumlah = rand(1, 5);
    $total = $barang[$i][2] * $jumlah;
    $pembelian[] = [
        "kode" => $barang[$i][0],
        "nama" => $barang[$i][1],
        "harga" => $barang[$i][2],
        "jumlah" => $jumlah,
        "total" => $total
    ];
    $grandtotal += $total;
}

// diskon
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
Tampilan Nota dalam Kotak Putih
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
            <?php foreach ($pembelian as $item): ?>
            <tr>
                <td><?= $item["kode"]; ?></td>
                <td><?= $item["nama"]; ?></td>
                <td>Rp<?= number_format($item["harga"], 0, ',', '.'); ?></td>
                <td><?= $item["jumlah"]; ?></td>
                <td>Rp<?= number_format($item["total"], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
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
        background-color: 		#FFA07A;
        color: white;
    }
    tfoot th {
        background-color: 	#A9A9A9;
        text-align: right;
    }
</style>
