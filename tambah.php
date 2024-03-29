<?php
// syntax session_start diperlukan untuk menggunakan variable super global $_SESSION
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
};

include("function.php");

if(isset($_POST["submit"])){
    if(create_data($_POST) < 0 ){
        header("location:error.php");
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
        <ul>
            <div class="mb-3">
                <label for="name">Name : </label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="nim">NIM : </label> 
                <input type="number" id="nim" name="nim" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email0">Email : </label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="prodi">jurusan : </label>
                <input type="text" id="prodi" name="prodi" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">
                Submit
            </button>
            
            <a href="index.php" class="btn btn-danger">
                Cancel
            </a>
            
        </ul>
    </form>
</body>
</html>