<?php
include("function.php");

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username  = '$username'" );

    // cek username sudah terdaftar atau belum
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // function password_verify digunakan untuk memverifikasi password dari database yang sudah di acak menggunakan function password_hash
        if (password_verify($password, $row["password"])){
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
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username"> <br>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit" name="login">Login</button><br>
        <a href="signup.php">Registras disini</a>
    </form>
    <?php if(isset($error)) : ?>
        <p>username atau password salah</p>
    <?php endif;?>
</body>
</html>