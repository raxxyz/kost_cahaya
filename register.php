<?php
    include "service/database.php";
    session_start();

    $register_message = "";
     
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        header("Location: dashboard.php");
        exit();
    }

     if(isset($_POST['register'])) {
         $username = $_POST['username'];
         $password = $_POST['password']; 

         try {
             $sql = "INSERT INTO user (nama, password) VALUES ('$username', '$password')";

         if($db->query($sql) === TRUE) {
                $register_message = "Pendaftaran berhasil!";
         } else {
                $register_message = "Pendaftaran gagal: ";
         }
        
         }catch (mysqli_sql_exception) {
            $register_message = "username sudah digunakan!";

         }
         $db->close();
        
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
    <h3>DAFTAR AKUN</h3>
      <i><?php echo $register_message; ?> </i>
    <form action="register.php" method="POST">
        <input type="text"placeholder="username" name="username"/>
        <input type="password"placeholder="password" name="password"/>
        <button type="submit" name="register">daftar sekarang</button>
    </form>
   <?php include "layout/footer.html" ?>
    
</body>
</html>