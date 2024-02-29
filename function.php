<?php
$conn = mysqli_connect("localhost","root","","review_php");

function query( $query ){
    global $conn;
    $result = mysqli_query( $conn, $query );
    $rows = [];
    while( $row = mysqli_fetch_assoc( $result ) ){
        $rows[] = $row;
    }
    return $rows;
}

function create_data( $post ){
    global $conn;

    // htmlspecialchars adalah parameter yang digunakan apabila ada user yang ingin menginputkan data dan data tersebut berupa tag html, maka tag html tersebut hanya akan menjadi sekumpulan string biasa dan tidak akan dijalankan oleh sistem

    $name = htmlspecialchars($post["name"]);
    $nim = htmlspecialchars($post["nim"]);
    $email = htmlspecialchars($post["email"]);
    $prodi = htmlspecialchars($post["prodi"]);

    $query = "INSERT INTO mahasiswa VALUES ('','$name','$nim','$email','$prodi')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function delete_data( $id ){
    global $conn;
    mysqli_query( $conn,"DELETE FROM mahasiswa WHERE id = $id");
    
    return mysqli_affected_rows($conn);
}

function update_data( $post ){
    global $conn;
    
    // htmlspecialchars adalah parameter yang digunakan apabila ada user yang ingin menginputkan data dan data tersebut berupa tag html, maka tag html tersebut hanya akan menjadi sekumpulan string biasa dan tidak akan dijalankan oleh sistem
    $id = ($post["id"]);
    $name = htmlspecialchars($post["name"]);
    $nim = htmlspecialchars($post["nim"]);
    $email = htmlspecialchars($post["email"]);
    $prodi = htmlspecialchars($post["prodi"]);
    
    $query = "UPDATE mahasiswa SET 
        name = '$name',
        nim = '$nim',
        email = '$email',
        prodi = '$prodi'

        WHERE id = $id
    ";
    mysqli_query($conn,$query);
    
    return mysqli_affected_rows($conn);
    }

function search( $key ){
    $query = "SELECT * FROM mahasiswa WHERE 
    name LIKE '%$key%' OR 
    nim LIKE '%$key%' OR
    email LIKE '%$key%'OR
    prodi LIKE '%$key%'";

    return query($query);
}

function registrasi( $data ){
    global $conn;

    $username = strtolower($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirmpassword = mysqli_real_escape_string($conn,$data["confirmpassword"]);

    $hasil = mysqli_query( $conn,"SELECT username FROM user WHERE username = '$username'");
    // cek username sudah ada atau belum
    if (mysqli_fetch_assoc($hasil)){
        echo"
        <script>alert('username sudah terdaftar')</script>
        ";

        return false;
    }

    // cek konfirmasi password sesuai
    if ($password!=$confirmpassword){
        echo "
        <script>alert('Sign Up gagal')</script>
        ";
        
        return false;
    }
    // enkripsi password agar password tidak dapat di ketahui oleh pihak manapun
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user ke database
    mysqli_query($conn,"INSERT INTO user VALUES('','$username','$password')");
    return mysqli_affected_rows($conn);
}

?>