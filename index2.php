<?php
// syntax untuk koneksi ke database ("namahosting","username","password","namadatabase",)
$conn = mysqli_connect("localhost","root","","review_php");
// password di kosongkan karena default, username (root) adalah default

// ambil data (query) data dari tabel mahasiswa
$result =  mysqli_query($conn,"SELECT * FROM mahasiswa");

// ambil data (fetch) dari var result memiliki beberapa cara

// mysqli_fetch_row :  akan mereturn dengan nilai numerik
// mysqli_fetch_assoc : akan mereturn dengan nilai assosiative
// mysqli_fetch_array : akan mereturn dengan nilai numerik dan assosiative
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Page</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table class="tabel">
        <tr class="tabelheader">
            <th>No.</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php while($mhs = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $mhs ["name"]?></td>
            <td><?php echo $mhs ["nim"]?></td>
            <td><?php echo $mhs ["email"]?></td>
            <td><?php echo $mhs ["prodi"]?></td>
            <td>
                <a href="">Update</a>
                <a href="">Delete</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endwhile;?>
    </table>
</body>
</html>