<?php
include("function.php");

$id = $_GET["id"];
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
if(isset($_POST["submit"])){
    if(update_data($_POST) < 0 ){
        header("location:error.php");
    }else{
        header("location:index.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Tambah Data</title>
</head>
<body>
    <form action="" method="post">
        <h1>Update Data</h1>
        <ul>
            <input type="hidden" name="id" value="<?php echo $mhs["id"]?>">

            <div class="mb-3">
                <label for="name">Name : </label>
                <input type="text" id="name" name="name" class="form-control" required value="<?php echo $mhs["name"]?>">
            </div>
            
            <div class="mb-3">
                <label for="nim">NIM : </label> 
                <input type="number" id="nim" name="nim" class="form-control" required value="<?php echo $mhs["nim"]?>">
            </div>

            <div class="mb-3">
                <label for="email0">Email : </label>
                <input type="text" id="email" name="email" class="form-control" required value="<?php echo $mhs["email"]?>">
            </div>

            <div class="mb-3">
                <label for="prodi">jurusan : </label>
                <input type="text" id="prodi" name="prodi" class="form-control" required value="<?php echo $mhs["prodi"]?>">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
                Ubah Data
            </button>
            
            <a href="index.php" class="btn btn-danger">
                Cancel
            </a>
            
        </ul>
    </form>
</body>
</html>