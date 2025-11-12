<?php
session_start();

// menyimpan data ke session
$_SESSION['nama'] = 'anggie';

echo $_SESSION['nama'];

// menghapus salah satu data session
unset($_SESSION['nama']);
