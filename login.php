<?php
// syntax session_start diperlukan untuk menggunakan variable super global $_SESSION
session_start();
include("function.php");

// cek cookie terlebih dahulu sebelum login
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id=$_COOKIE["id"];
    $key=$_COOKIE["key"];
    
    // ambil username baedasar id
    $result=mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
    $row=mysqli_fetch_assoc($result);

    // cek cookie dan username
    if($key === hash('sha256', $row["username"])){
        $_SESSION['login'] = true;
    }
}

if(isset($_SESSION["login"])){
    header("Location: index.php");
}


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username  = '$username'" );

    // cek username sudah terdaftar atau belum
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // function password_verify digunakan untuk memverifikasi password dari database yang sudah di acak menggunakan function password_hash
        if (password_verify($password, $row["password"])){
            // set session
            // var super global session digunakan untuk mencegah user bisa sembarangan masuk ke sebuah halaman tanpa login terlebih dahulu
            $_SESSION["login"]=true;

            // set cookie
            if(isset($_POST["remember"])){
                setcookie("id",$row['id'], time()+60);
                setcookie("key",hash('sha256',$row['username']), time()+60);
            }

            header("Location: index.php");
            exit;
        }
    }
    $error = true;
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
    <title>Login</title>
</head>
<body>
    <form action="" method="post" class="p-5 position-absolute top-50 start-50 translate-middle bg-light rounded-2">
        <h1 class="mb-4 h3">Login here!</h1>
        <input type="text" name="username" placeholder="Username" class="form-control"> <br>
        <input type="password" name="password" placeholder="Password" class="form-control"><br>
        <label for="remember">Remember me</label>
        <input type="checkbox" name="remember" id="remember">

        <div class="container-fluid text-center">
            <button type="submit" name="login" class="btn btn-primary mb-1">Login</button><br>
            <p class="m-1 text-secondary">or</p>
            <a href="signup.php" class="btn btn-success mt-1">Registrasi disini</a>
        </div>
    </form>
    <?php if(isset($error)) : ?>
        <p>username atau password salah</p>
    <?php endif;?>
</body>
</html>