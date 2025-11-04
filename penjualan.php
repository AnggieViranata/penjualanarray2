<?php
// ===============================
// Commit 1 – Setup Awal
// ===============================

// Header toko
echo "<h2> --POLGAN MART-- </h2>";

// Data produk (5 produk)
$kode_barang  = ["B001", "B002", "B003", "B004", "B005"];
$nama_barang  = ["Teh Pucuk", "Sukro", "Sprite", "Chitato", "Indomie"];
$harga_barang = [5000, 1000, 4000, 8000, 3500];


// ===============================
// Commit 2 – Logika Pembelian
// ===============================

// buat array gabungan agar bisa diacak sekaligus
$barang = [
    ["B001", "Teh Pucuk", 5000],
    ["B002", "Sukro", 1000],
    ["B003", "Sprite", 4000],
    ["B004", "Chitato", 8000],
    ["B005", "Indomie", 3500]
];

// fungsi untuk acak urutan produk
shuffle($barang);

// tampilkan hasil daftar barang acak
foreach ($barang as $b) {
    echo "Kode Barang : $b[0]<br>";
    echo "Nama Barang : $b[1]<br>";
    echo "Harga Barang : $b[2]<br><br>";
}

echo "Data pembelian acak berhasil dibuat!<br>";
echo "<strong>====================================================</strong><br><br>";


// ===============================
// Commit 3 – Perhitungan Total Pembelian
// ===============================

// buat variabel grand total
$grandtotal = 0;

// perulangan for untuk memilih barang dan jumlah beli acak
for ($i = 0; $i < count($barang); $i++) {
    $jumlah = rand(1, 5); // jumlah beli acak antara 1–5
    $total = $barang[$i][2] * $jumlah; // total harga per item
    $grandtotal += $total; // tambahkan ke total keseluruhan

    // tampilkan detail tiap barang
    echo "Kode Barang : " . $barang[$i][0] . "<br>";
    echo "Nama Barang : " . $barang[$i][1] . "<br>";
    echo "Harga Barang : " . $barang[$i][2] . "<br>";
    echo "Jumlah Beli : " . $jumlah . "<br>";
    echo "Total Harga : " . $total . "<br><br>";
}

// tampilkan total keseluruhan
echo "<strong>Grand Total : Rp $grandtotal</strong><br>";
echo "Data pembelian acak berhasil dibuat!<br>";
echo "<strong>====================================================</strong><br><br>";
?>
