<?php
include "service/database.php";
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE nama='$username' AND password='$password'";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {

        $data = $result->fetch_assoc();

        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['logged_in'] = true;

        header("Location: dashboard.php");
        exit();

    } else {
        echo "Login gagal: Nama atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php include "layout/header.html" ?>
    
    <h3>LOGIN AKUN</h3>
    <form action="login.php" method="POST">
        <input type="text"placeholder="nama" name="username"/>
        <input type="password"placeholder="password" name="password"/>
        <button type="submit" name="login">masuk sekarang</button>
    </form>
   <?php include "layout/footer.html" ?>
    
</body>
</html>