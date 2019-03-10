<?php
// Cikis sayfasi
// oturum baslat
session_start();

// oturum tamaman sil
session_destroy();

// Yonlendir ana sayfaya
header("Location: index.php");

?>