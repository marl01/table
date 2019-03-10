<?php

// oturum ac
session_start();

set_include_path('..');

require("tablo/tablo.php");

// Mesajlar
$mesaj = "";


if($_GET){

	if(!empty($_GET['id'])){

		$kategori_id = $_GET['id'];

		$tablo = new tablo();

		$urun = $tablo->kategori_sil($kategori_id);
		
		$_SESSION['mesaj'] 	= "Kategori başarıyla silindi";
		header("Location: kategoriler.php");
	}



}






?>
