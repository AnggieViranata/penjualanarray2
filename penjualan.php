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

// ===============================
// Commit 4 – Output Akhir
// ===============================
echo "<h3>NOTA PEMBELIAN</h3>";
echo "<pre>"; // pakai <pre> agar format spasi dan padding terlihat rapi

echo "====================================================\n";
echo "Kode   | Nama Barang      | Harga     | Jumlah | Total      \n";
echo "----------------------------------------------------\n";

// tampilkan ulang data pembelian acak
$grandtotal = 0;
for ($i = 0; $i < count($barang); $i++) {
    $jumlah = rand(1, 5); // jumlah acak
    $total = $barang[$i][2] * $jumlah;
    $grandtotal += $total;

    // format kolom agar rapi
    $kode   = str_pad($barang[$i][0], 6);
    $nama   = str_pad($barang[$i][1], 16);
    $harga  = str_pad("Rp" . number_format($barang[$i][2], 0, ',', '.'), 10, ' ', STR_PAD_LEFT);
    $jml    = str_pad($jumlah, 6, ' ', STR_PAD_LEFT);
    $tot    = str_pad("Rp" . number_format($total, 0, ',', '.'), 10, ' ', STR_PAD_LEFT);

    echo "{$kode}| {$nama}| {$harga} | {$jml} | {$tot}\n";
}

echo "----------------------------------------------------\n";
echo "Grand Total : Rp" . number_format($grandtotal, 0, ',', '.') . "\n";
echo "====================================================\n";
echo "Terima kasih telah berbelanja di POLGAN MART!\n";
echo "</pre>";


// ===============================
// Commit 5 – Menambahkan Kode Barang
// ===============================
echo "<h3>NOTA PEMBELIAN</h3>";
echo "<pre>";
echo "====================================================\n";
echo "<strong>Kode Barang | Nama Barang      | Harga     | Jumlah | Total</strong>\n";
echo "----------------------------------------------------\n";

$grandtotal = 0;

// tampilkan ulang data pembelian acak dengan kolom kode barang yang lebih rapi
for ($i = 0; $i < count($barang); $i++) {
    $jumlah = rand(1, 5);
    $total = $barang[$i][2] * $jumlah;
    $grandtotal += $total;

    // format kolom agar lebih sejajar
    $kode   = str_pad($barang[$i][0], 11);
    $nama   = str_pad($barang[$i][1], 16);
    $harga  = str_pad("Rp" . number_format($barang[$i][2], 0, ',', '.'), 10, ' ', STR_PAD_LEFT);
    $jml    = str_pad($jumlah, 6, ' ', STR_PAD_LEFT);
    $tot    = str_pad("Rp" . number_format($total, 0, ',', '.'), 10, ' ', STR_PAD_LEFT);

    echo "{$kode}| {$nama}| {$harga} | {$jml} | {$tot}\n";
}

echo "----------------------------------------------------\n";
echo "<strong>Grand Total : Rp" . number_format($grandtotal, 0, ',', '.') . "</strong>\n";
echo "====================================================\n";
echo "</pre>";


// ===============================
// Commit 6 – Menambahkan Diskon
// ===============================

echo "<h3>NOTA PEMBELIAN</h3>";
echo "<div style='font-family: monospace;'>";
echo "====================================================<br>";
echo "<strong>Kode Barang | Nama Barang      | Harga     | Jumlah | Total</strong><br>";
echo "----------------------------------------------------<br>";

$grandtotal = 0;

// tampilkan ulang data pembelian acak dengan kolom kode barang yang rapi
for ($i = 0; $i < count($barang); $i++) {
    $jumlah = rand(1, 5);
    $total = $barang[$i][2] * $jumlah;
    $grandtotal += $total;

    // format kolom agar lebih sejajar
    $kode   = str_pad($barang[$i][0], 11);
    $nama   = str_pad($barang[$i][1], 16);
    $harga  = str_pad("Rp" . number_format($barang[$i][2], 0, ',', '.'), 10, ' ', STR_PAD_LEFT);
    $jml    = str_pad($jumlah, 6, ' ', STR_PAD_LEFT);
    $tot    = str_pad("Rp" . number_format($total, 0, ',', '.'), 10, ' ', STR_PAD_LEFT);

    echo "{$kode}| {$nama}| {$harga} | {$jml} | {$tot}<br>";
}

// ----------------------------------------------------
// Hitung Diskon
// ----------------------------------------------------
if ($grandtotal <= 50000) {
    $persen = 5;
} elseif ($grandtotal <= 100000) {
    $persen = 10;
} else {
    $persen = 20;
}

$diskon = $grandtotal * ($persen / 100);
$total_setelah_diskon = $grandtotal - $diskon;

// ----------------------------------------------------
// Output bagian bawah nota
// ----------------------------------------------------
echo "----------------------------------------------------<br>";
echo "Grand Total : Rp" . number_format($grandtotal, 0, ',', '.') . "<br>";

echo "Diskon : Rp" . number_format($diskon, 0, ',', '.') . " ({$persen}%)<br>";
echo "====================================================<br>";
echo "</div>";

?>
<?php
