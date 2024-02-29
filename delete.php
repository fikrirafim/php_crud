<?php
include("function.php");

$id = $_GET["id"];

if(delete_data($id) > 0) {
echo"
<script>
    alert('data berhasil dihapus');
    document.location.href = 'index.php';
</script>";
}
?>