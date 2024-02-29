<?php
include("function.php");

if (isset($_POST["registrasi"])) {
    if (registrasi($_POST) > 0 ){
        echo "
        <script>
            alert('sign up berhasil kembali ke login')
        </script>";
    } else {
        mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Registrasi</title>
</head>
<body class="text-center">
        <form action="" method="post" class="p-5 position-absolute top-50 start-50 translate-middle bg-light rounded-2">
            <h1 class="mb-3 font-weight-normal">Sign up here</h1>
            <!-- <label for="username" class="sr-only">username : </label> -->
            <input type="text" name="username" id="username" class="mb-3 form-control" placeholder="Username"> 
            <!-- <label for="password">Password : </label> -->
            <input type="password" name="password" id="password" class="mb-3 form-control" placeholder="Password">
            <!-- <label for="confirmpassword">Konfirmasi Password : </label> -->
            <input type="password" name="confirmpassword" id="confirmpassword" class="mb-3 form-control" placeholder="Konfirmasi Password">
            <button type="submit" name="registrasi" class="btn btn-primary p-2">Registrasi</button>
        </form>
</body>
</html>