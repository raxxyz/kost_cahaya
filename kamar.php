<?php
include "service/database.php";

// validasi parameter
if (!isset($_GET['id'])) {
    die("ID kamar tidak ditemukan");
}

$id = $_GET['id'];

// query ambil data kamar
$query = "SELECT * FROM kamar WHERE id_kamar = '$id'";
$result = mysqli_query($db, $query);

// ambil 1 data
$data = mysqli_fetch_assoc($result);

// validasi data
if (!$data) {
    die("Data kamar tidak ditemukan");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Kamar</title>
</head>
<body>

<h2>Detail Kamar</h2>

<p><strong>Nama:</strong> <?= $data['nama_kamar']; ?></p>
<p><strong>Harga:</strong> Rp <?= number_format($data['harga']); ?>/bulan</p>
<p><strong>Fasilitas:</strong> <?= $data['fasilitas']; ?></p>
<p><strong>Deskripsi:</strong> <?= $data['deskripsi']; ?></p>

<a href="booking.php?id=<?= $data['id_kamar']; ?>">Booking Sekarang</a>

<a href="index.php">Kembali</a>

</body>
</html>