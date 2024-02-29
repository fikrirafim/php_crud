<?php
require "function.php";
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST["search"])) {
    $mahasiswa = search($_POST["key"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Page</title>
</head>
<body>
    <h1 class="container">Data Mahasiswa</h1>

    <form action="" method="post">
        <input type="text" name="key" autofocus placeholder="Apa yang mau kamu cari?" autocomplete="off">
        <button type="submit" name="search">Cari</button>
    </form>

    <table class="container table table-secondary">
        <tr class="table-primary">
            <th>No.</th >
            <th>Nama</th >
            <th>NIM</th >
            <th>Email</th >
            <th>Prodi</th >
            <th>Aksi</th >
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $mahasiswa as $mhs): ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $mhs ["name"]?></td>
            <td><?php echo $mhs ["nim"]?></td>
            <td><?php echo $mhs ["email"]?></td>
            <td><?php echo $mhs ["prodi"]?></td>
            <td>
                <a class="btn btn-primary" href="update.php?id=<?php echo $mhs["id"]?>">Update</a>
                <a class = "btn btn-danger" href="delete.php?id=<?php echo $mhs["id"]; ?>" onclick="return confirm('Hapus Data ?')">Delete</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach;?>
    </table>
    <div class="container">
        <a class="btn btn-success" href="tambah.php">Tambah Data</a>
    </div>

</body>
</html>