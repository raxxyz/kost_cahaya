<?php
    include "service/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column min-vh-100">

<?php include "layout/header.html"; ?>

<main class="flex-grow-1 d-flex flex-column">

    <div class="container">

        <h1 class="text-center mt-5">Selamat Datang di Kost Cahaya</h1>

        <p class="text-center">
            Kost Cahaya adalah tempat yang nyaman untuk tinggal...
        </p>

        <div class="mb-3">
            <input type="text" class="form-control" placeholder="lihat kamar yang tersedia">
        </div>
        <?php include "layout/detail_kamar.php"; ?>
    </div>

</main>
</body>

</html>
