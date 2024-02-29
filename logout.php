<?php
session_start();
$_SESSION=[];
// syntax session_destroy digunakan untuk mengakhiri session yang dimulai sebelumnya
session_destroy();
header("Location: login.php");
exit;
?>