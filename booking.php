<?php
session_start();
include "service/database.php";

// proteksi: wajib login
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

// ambil data
$id_user = $_SESSION['id_user'];
$id_kamar = intval($_GET['id']);

// ambil data kamar
$q = mysqli_query($db, "SELECT * FROM kamar WHERE id_kamar = '$id_kamar'");
$kamar = mysqli_fetch_assoc($q);

if (!$kamar) {
    die("Kamar tidak ditemukan");
}

// proses booking
if (isset($_POST['submit'])) {

    $tanggal = $_POST['tanggal_booking'];
    $lama = intval($_POST['lama_sewa']);

    if ($lama <= 0) {
        die("Lama sewa tidak valid");
    }

    $total = $kamar['harga'] * $lama;

    $query = "INSERT INTO booking 
    (id_user, id_kamar, tanggal_booking, lama_sewa, total_harga, status)
    VALUES 
    ('$id_user', '$id_kamar', '$tanggal', '$lama', '$total', 'pending')";

    if (mysqli_query($db, $query)) {
        echo "<script>alert('Booking berhasil'); window.location='dashboard.php';</script>";
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Booking Kamar</title>
</head>
<body>

<h2>Booking Kamar</h2>

<p><strong>Nama Kamar:</strong> <?= $kamar['nama_kamar']; ?></p>
<p><strong>Harga:</strong> Rp <?= number_format($kamar['harga']); ?>/bulan</p>

<form method="POST">
    <label>Tanggal Booking:</label><br>
    <input type="date" name="tanggal_booking" required><br><br>

    <label>Lama Sewa (bulan):</label><br>
    <input type="number" name="lama_sewa" required><br><br>

    <button type="submit" name="submit">Booking Sekarang</button>
</form>

</body>
</html>