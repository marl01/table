<?php

// oturum ac
session_start();

set_include_path('..');

require("tablo/tablo.php");

// Mesajlar
$mesaj = "";


if($_GET){

	if(!empty($_GET['id'])){

		$urun_id = $_GET['id'];

		$tablo = new tablo();

		$urun = $tablo->urun_sil($urun_id);
		
		$_SESSION['mesaj'] 	= "Ürün başarıyla silindi";
		header("Location: urunler.php");
	}


}


?>
