<?php
session_start();
include "service/database.php";

// proteksi login
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

// ambil data booking user
$query = "SELECT booking.*, kamar.nama_kamar
          FROM booking
          JOIN kamar ON booking.id_kamar = kamar.id_kamar
          WHERE booking.id_user = '$id_user'";

$result = mysqli_query($db, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Riwayat Booking Saya</h2>

<p>Selamat datang, <?= $_SESSION['nama']; ?></p>

<table border="1" cellpadding="10">
    <tr>
        <th>Nama Kamar</th>
        <th>Tanggal Booking</th>
        <th>Lama Sewa</th>
        <th>Total Harga</th>
        <th>Status</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['nama_kamar']; ?></td>
        <td><?= $row['tanggal_booking']; ?></td>
        <td><?= $row['lama_sewa']; ?> bulan</td>
        <td>Rp <?= number_format($row['total_harga']); ?></td>
        <td><?= $row['status']; ?></td>
    </tr>
<?php } ?>

</table>

<br>

<form method="POST">
    <button type="submit" name="logout">Logout</button>
</form>

<?php
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
}
?>

</body>
</html>